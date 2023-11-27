<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class LandingPageController extends Controller
{
    private function getData($endpoint)
    {
        return Http::get(url('api/' . $endpoint))->object();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'True Bengkel';

        $about = $this->getData('about');
        $brand = $this->getData('brand');
        $sparePart = $this->getData('spare-part');
        $pegawai = $this->getData('pegawai');
        $gallery = $this->getData('gallery');

        $data['about'] = $about->data[0];
        $data['brand'] = $brand->data;
        $data['sparePart'] = $sparePart->data;
        $data['pegawai'] = $pegawai->data;
        $data['gallery'] = $gallery->data;

        return view('landing-page.index', $data)
            ->with('footerView', view('layouts.landing-page.footer', $data));
    }

    public function products()
    {
        $data['title'] = 'Products';

        $sparePart = $this->getData('spare-part');
        $brand = $this->getData('brand');

        $data['sparePart'] = $sparePart->data;
        $data['brand'] = $brand->data;

        return view('landing-page.products', $data);
    }

    public function productsDetail($id)
    {
        $data['title'] = 'Products Detail';

        $sparePart = Http::get(url('api/spare-part/detail/' . $id))->object();

        $data['sparePart'] = $sparePart->data[0];

        return view('landing-page.products-detail', $data);
    }

    public function customerService()
    {
        $data['title'] = 'Customer Serivce';

        $pegawai = $this->getData('pegawai');

        $data['pegawai'] = $pegawai->data;

        return view('landing-page.customer-service', $data);
    }

    public function gallery()
    {
        $data['title'] = 'Gallery';

        $gallery = $this->getData('gallery');

        $data['gallery'] = $gallery->data;

        return view('landing-page.gallery', $data);
    }
}
