<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Event;
use App\Models\Ministry;
use App\Models\Sermon;

class HomeController extends Controller
{
    public function index()
    {
        $latestSermon = Sermon::published()
            ->orderBy('sermon_date', 'desc')
            ->orderBy('id', 'desc')
            ->first();

        $upcomingEvents = Event::published()
            ->upcoming()
            ->orderBy('starts_at')
            ->take(3)
            ->get();

        $ministries = Ministry::active()
            ->ordered()
            ->take(3)
            ->get();

        $latestAnnouncement = Announcement::published()
            ->orderBy('created_at', 'desc')
            ->first();

        return view('public.home', compact('latestSermon', 'upcomingEvents', 'ministries', 'latestAnnouncement'));
    }
}
