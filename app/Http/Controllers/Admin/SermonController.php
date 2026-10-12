<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SermonRequest;
use App\Models\Sermon;
use Illuminate\Http\Request;

class SermonController extends Controller
{
    public function index(Request $request)
    {
        $query = Sermon::query();

        if ($search = $request->get('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('preacher', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $status = $request->get('status');
            if ($status === 'published') {
                $query->where('is_published', true);
            } elseif ($status === 'unpublished') {
                $query->where('is_published', false);
            }
        }

        $sermons = $query->latest()->paginate(10)->withQueryString();

        return view('admin.sermons.index', compact('sermons'));
    }

    public function create()
    {
        return view('admin.sermons.create');
    }

    public function store(SermonRequest $request)
    {
        $validated = $request->validated();
        $validated['slug'] = $request->input('slug') ?: Sermon::generateUniqueSlug($validated['title']);
        $validated['slug'] = $this->ensureUniqueSlug($validated['slug']);
        $validated['is_published'] = $request->boolean('is_published');
        $validated['published_at'] = $validated['is_published'] ? now() : null;

        Sermon::create($validated);

        return redirect()->route('admin.sermons.index')
            ->with('success', 'Sermon created successfully.');
    }

    public function show(Sermon $sermon)
    {
        return view('admin.sermons.show', compact('sermon'));
    }

    public function edit(Sermon $sermon)
    {
        return view('admin.sermons.edit', compact('sermon'));
    }

    public function update(SermonRequest $request, Sermon $sermon)
    {
        $validated = $request->validated();
        $validated['slug'] = $request->input('slug') ?: Sermon::generateUniqueSlug($validated['title']);
        $validated['slug'] = $this->ensureUniqueSlug($validated['slug'], $sermon->id);
        $validated['is_published'] = $request->boolean('is_published');

        if ($validated['is_published'] && !$sermon->is_published) {
            $validated['published_at'] = now();
        } elseif (!$validated['is_published']) {
            $validated['published_at'] = null;
        }

        $sermon->update($validated);

        return redirect()->route('admin.sermons.index')
            ->with('success', 'Sermon updated successfully.');
    }

    public function destroy(Sermon $sermon)
    {
        $sermon->delete();

        return redirect()->route('admin.sermons.index')
            ->with('success', 'Sermon deleted successfully.');
    }

    public function publish(Sermon $sermon)
    {
        $sermon->update([
            'is_published' => true,
            'published_at' => $sermon->published_at ?? now(),
        ]);

        return redirect()->back()->with('success', 'Sermon published successfully.');
    }

    public function unpublish(Sermon $sermon)
    {
        $sermon->update([
            'is_published' => false,
            'published_at' => null,
        ]);

        return redirect()->back()->with('success', 'Sermon unpublished successfully.');
    }

    protected function ensureUniqueSlug(string $slug, ?int $ignoreId = null): string
    {
        $originalSlug = $slug;
        $count = 1;

        while (Sermon::where('slug', $slug)->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }
}
