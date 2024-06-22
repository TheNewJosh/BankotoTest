<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\MediaUpload;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Product::get();
        $media = MediaUpload::get();
        return view('home', [
            'data'=> $data, 
            'productCount' => $data->count(),
            'mediaCount' => $media->count(),
        ]);
    }


    public function media()
    {
        $data = MediaUpload::get();
        return view('media', ['data'=> $data]);
    }
}
