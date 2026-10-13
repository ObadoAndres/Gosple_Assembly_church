<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Event;
use App\Models\Ministry;
use App\Models\Sermon;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'sermons' => Sermon::count(),
            'sermons_published' => Sermon::published()->count(),
            'events' => Event::count(),
            'events_upcoming' => Event::published()->upcoming()->count(),
            'ministries' => Ministry::count(),
            'ministries_active' => Ministry::active()->count(),
            'announcements' => Announcement::count(),
            'announcements_published' => Announcement::published()->count(),
        ];

        $recentSermons = Sermon::latest()->take(5)->get();
        $upcomingEvents = Event::upcoming()->orderBy('starts_at')->take(5)->get();
        $activeAnnouncements = Announcement::published()->latest()->take(3)->get();

        return view('admin.dashboard.index', compact('stats', 'recentSermons', 'upcomingEvents', 'activeAnnouncements'));
    }
}
