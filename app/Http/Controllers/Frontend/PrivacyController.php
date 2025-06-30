<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    //
    public function index()
    {

        $page = 'privacy';

        return view('frontend.privacy.index', compact('page'));
    }
}
