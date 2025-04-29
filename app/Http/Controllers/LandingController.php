<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('pages.landing');
    }
    public function explore()
    {
        return view('pages.explore');
    }
}
