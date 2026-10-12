<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function about()
    {
        return view('public.about');
    }

    public function visionMission()
    {
        return view('public.vision-mission');
    }

    public function leadership()
    {
        return view('public.leadership');
    }

    public function services()
    {
        return view('public.services');
    }

    public function giving()
    {
        return view('public.giving');
    }

    public function contact()
    {
        return view('public.contact');
    }
}
