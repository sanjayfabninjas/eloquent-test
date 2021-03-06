<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Show the application dashboard.
    public function home(){
        return view('home');
    }

    // Show the application contact page.
    public function contact(){
        return view('contact');
    }

    // Show the application about page.
    public function about(){
        return view('about');
    }
}
