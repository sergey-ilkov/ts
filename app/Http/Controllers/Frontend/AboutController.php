<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    public function index()
    {

        $page = 'about';
        return view('frontend.about.index', compact('page'));
    }
}
