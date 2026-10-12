<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EventRequest;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::query();

        if ($search = $request->get('search')) {
            $query->where('title', 'like', "%{$search}%");
        }

        if ($request->filled('status')) {
            $status = $request->get('status');
            if ($status === 'published') {
                $query->where('is_published', true);
            } elseif ($status === 'unpublished') {
                $query->where('is_published', false);
            }
        }

        if ($request->filled('filter')) {
            $filter = $request->get('filter');
            if ($filter === 'upcoming') {
                $query->upcoming();
            } elseif ($filter === 'past') {
                $query->past();
            }
        }

        $events = $query->latest()->paginate(10)->withQueryString();

        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(EventRequest $request)
    {
        $validated = $request->validated();
        $validated['slug'] = $request->input('slug') ?: Event::generateUniqueSlug($validated['title']);
        $validated['slug'] = $this->ensureUniqueSlug($validated['slug']);
        $validated['is_published'] = $request->boolean('is_published');
        $validated['published_at'] = $validated['is_published'] ? now() : null;

        Event::create($validated);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event created successfully.');
    }

    public function show(Event $event)
    {
        return view('admin.events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(EventRequest $request, Event $event)
    {
        $validated = $request->validated();
        $validated['slug'] = $request->input('slug') ?: Event::generateUniqueSlug($validated['title']);
        $validated['slug'] = $this->ensureUniqueSlug($validated['slug'], $event->id);
        $validated['is_published'] = $request->boolean('is_published');

        if ($validated['is_published'] && !$event->is_published) {
            $validated['published_at'] = now();
        } elseif (!$validated['is_published']) {
            $validated['published_at'] = null;
        }

        $event->update($validated);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.events.index')
            ->with('success', 'Event deleted successfully.');
    }

    public function publish(Event $event)
    {
        $event->update([
            'is_published' => true,
            'published_at' => $event->published_at ?? now(),
        ]);

        return redirect()->back()->with('success', 'Event published successfully.');
    }

    public function unpublish(Event $event)
    {
        $event->update([
            'is_published' => false,
            'published_at' => null,
        ]);

        return redirect()->back()->with('success', 'Event unpublished successfully.');
    }

    protected function ensureUniqueSlug(string $slug, ?int $ignoreId = null): string
    {
        $originalSlug = $slug;
        $count = 1;

        while (Event::where('slug', $slug)->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }
}
