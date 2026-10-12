<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AnnouncementRequest;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index(Request $request)
    {
        $query = Announcement::query();

        if ($search = $request->get('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('body', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $status = $request->get('status');
            if ($status === 'draft') {
                $query->where('is_published', false);
            } elseif ($status === 'published') {
                $query->where('is_published', true)
                    ->where(function ($q) {
                        $q->whereNull('published_at')->orWhere('published_at', '<=', now());
                    })
                    ->where(function ($q) {
                        $q->whereNull('expires_at')->orWhere('expires_at', '>', now());
                    });
            } elseif ($status === 'expired') {
                $query->where('is_published', true)
                    ->whereNotNull('expires_at')
                    ->where('expires_at', '<=', now());
            } elseif ($status === 'scheduled') {
                $query->where('is_published', true)
                    ->whereNotNull('published_at')
                    ->where('published_at', '>', now());
            }
        }

        $announcements = $query->latest()->paginate(10)->withQueryString();

        return view('admin.announcements.index', compact('announcements'));
    }

    public function create()
    {
        return view('admin.announcements.create');
    }

    public function store(AnnouncementRequest $request)
    {
        $validated = $request->validated();
        $validated['slug'] = $request->input('slug') ?: Announcement::generateUniqueSlug($validated['title']);
        $validated['slug'] = $this->ensureUniqueSlug($validated['slug']);
        $validated['is_published'] = $request->boolean('is_published');
        if (!$validated['is_published']) {
            $validated['published_at'] = null;
        }

        Announcement::create($validated);

        return redirect()->route('admin.announcements.index')
            ->with('success', 'Announcement created successfully.');
    }

    public function show(Announcement $announcement)
    {
        return view('admin.announcements.show', compact('announcement'));
    }

    public function edit(Announcement $announcement)
    {
        return view('admin.announcements.edit', compact('announcement'));
    }

    public function update(AnnouncementRequest $request, Announcement $announcement)
    {
        $validated = $request->validated();
        $validated['slug'] = $request->input('slug') ?: Announcement::generateUniqueSlug($validated['title']);
        $validated['slug'] = $this->ensureUniqueSlug($validated['slug'], $announcement->id);
        $validated['is_published'] = $request->boolean('is_published');
        if (!$validated['is_published']) {
            $validated['published_at'] = null;
        }

        $announcement->update($validated);

        return redirect()->route('admin.announcements.index')
            ->with('success', 'Announcement updated successfully.');
    }

    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return redirect()->route('admin.announcements.index')
            ->with('success', 'Announcement deleted successfully.');
    }

    public function publish(Announcement $announcement)
    {
        $announcement->update([
            'is_published' => true,
            'published_at' => $announcement->published_at ?? now(),
        ]);
        return redirect()->back()->with('success', 'Announcement published successfully.');
    }

    public function unpublish(Announcement $announcement)
    {
        $announcement->update([
            'is_published' => false,
            'published_at' => null,
        ]);
        return redirect()->back()->with('success', 'Announcement unpublished successfully.');
    }

    protected function ensureUniqueSlug(string $slug, ?int $ignoreId = null): string
    {
        $originalSlug = $slug;
        $count = 1;

        while (Announcement::where('slug', $slug)->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }
}
