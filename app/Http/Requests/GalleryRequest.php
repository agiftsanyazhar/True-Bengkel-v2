<?php

namespace App\Http\Requests;

use App\Models\{
    Gallery,
};
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\{
    Log,
    Storage,
};

class GalleryRequest extends FormRequest
{
    private $uploadPath;

    public function __construct()
    {
        $this->uploadPath = 'uploads/gallery/';
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'image' => 'mimes:jpeg,jpg,png|max:2048',
        ];
    }

    public function store($request)
    {
        try {
            $data = $this->validated();

            if ($request->hasFile('image')) {
                $imageName = $request->file('image');
                $data['image'] = $imageName->store($this->uploadPath);
            }

            $gallery = Gallery::create($data);

            $success = true;
            $message = 'Success';
        } catch (\Exception $e) {
            Log::debug($e->getMessage());

            $success = false;
            $message = 'Failure. ' . $e->getMessage();
        }

        return [
            'success' => $success,
            'message' => $message,
            'data' => $gallery,
        ];
    }

    public function update($request)
    {
        try {
            $data = $this->validated();

            $gallery = Gallery::findOrFail($request->id);

            if ($request->hasFile('image')) {
                $imageName = $request->file('image');
                $data['image'] = $imageName->store($this->uploadPath);
                Storage::delete($gallery->image);
            }

            $gallery->update($data);

            $success = true;
            $message = 'Success';
        } catch (\Exception $e) {
            Log::debug($e->getMessage());

            $success = false;
            $message = 'Failure. ' . $e->getMessage();
        }

        return [
            'success' => $success,
            'message' => $message,
            'data' => $gallery,
        ];
    }
}
