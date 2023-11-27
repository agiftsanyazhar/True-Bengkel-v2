<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vcHJveWVrYWtoaXJ3ZWIudGVzdC9hcGkvYXV0aC9sb2dpbiIsImlhdCI6MTcwMDc0MDAyNiwiZXhwIjoxNzAwNzQzNjI2LCJuYmYiOjE3MDA3NDAwMjYsImp0aSI6IjEyQVpERzR4R2R5ZkdHZm8iLCJzdWIiOiIxIiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.keuPGdHKg3d9vceC13dNI4QVuuwWhiFEoephJ3qOepY';
    public function index()
    {
        $events = Http::get(url('/api/event'))->object();
        return view('/admin/event/event/index', ['events' => $events]);
    }

    public function create()
    {
        $categoryEvent = Http::get(url('/api/category-event'))->object();
        return view('/admin/event/event/add', ['categoryEvent' => $categoryEvent]);
    }

    public function store(Request $request)
    {
        $attachments = [];
        $attachments[] = [
            'name' => 'poster',
            'contents' => $request->poster->get(),
            'filename' => $request->poster->getClientOriginalName(),
        ];
        $attachments[] = [
            'name' => 'thumbnail',
            'contents' => $request->thumbnail->get(),
            'filename' => $request->thumbnail->getClientOriginalName(),
        ];
        if ($request->venue_image) {
            $attachments[] = [
                'name' => 'venue_image',
                'contents' => $request->venue_image->get(),
                'filename' => $request->venue_image->getClientOriginalName(),
            ];
        }
        // var_dump($attachments);
        // die;
        $headers = [
            'Authorization' => "Bearer $this->token",
        ];

        $event = Http::withHeaders($headers)->attach($attachments)->post(url('/api/event/create'), [
            'category_event_id' => $request->category_event_id,
            'event_title' => $request->event_title,
            'description' => $request->description,
            'location' => $request->location,
            'date' => $request->date,
        ])->object();

        // var_dump($event);
        // die();

        if ($event->success == true) {
            return redirect(url('admin/event'));
        } else {
            return redirect()->back();
        }
    }

    public function destroy($eventId)
    {
        $headers = [
            'Authorization' => "Bearer $this->token",
        ];
        $event = Http::withHeaders($headers)->delete(url("/api/event/$eventId"))->object();
        // var_dump($event);
        // die;
        if ($event->success == true) {
            return redirect(url('admin/event'));
            // return view('/admin/event/event/index', ['events' => $events]);
        }
    }
}
