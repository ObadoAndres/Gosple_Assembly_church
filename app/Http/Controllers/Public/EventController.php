<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $upcoming = Event::published()
            ->upcoming()
            ->orderBy('starts_at')
            ->get();

        $past = Event::published()
            ->past()
            ->orderBy('starts_at', 'desc')
            ->paginate(12);

        return view('public.events.index', compact('upcoming', 'past'));
    }

    public function show($slug)
    {
        $event = Event::where('slug', $slug)->first();

        if (!$event || !$event->is_published ||
            ($event->published_at && $event->published_at->gt(now()))) {
            abort(404);
        }

        return view('public.events.show', compact('event'));
    }
}
