<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('website.page.shipping');
    }

    public function returnPolicy()
    {
        return view('website.page.return');
    }

    public function privacyPolicy()
    {
        return view('website.page.privacy');
    }
}
