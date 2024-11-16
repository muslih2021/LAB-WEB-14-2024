<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class galleryController extends Controller
{
    public function gallery()
    {
        return view('gallery');
    }
}
