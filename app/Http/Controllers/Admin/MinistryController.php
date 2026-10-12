<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MinistryRequest;
use App\Models\Ministry;
use Illuminate\Http\Request;

class MinistryController extends Controller
{
    public function index(Request $request)
    {
        $query = Ministry::query();

        if ($search = $request->get('search')) {
            $query->where('name', 'like', "%{$search}%");
        }

        if ($request->filled('status')) {
            $status = $request->get('status');
            if ($status === 'active') {
                $query->where('is_active', true);
            } elseif ($status === 'inactive') {
                $query->where('is_active', false);
            }
        }

        $ministries = $query->ordered()->paginate(10)->withQueryString();

        return view('admin.ministries.index', compact('ministries'));
    }

    public function create()
    {
        return view('admin.ministries.create');
    }

    public function store(MinistryRequest $request)
    {
        $validated = $request->validated();
        $validated['slug'] = $request->input('slug') ?: Ministry::generateUniqueSlug($validated['name']);
        $validated['slug'] = $this->ensureUniqueSlug($validated['slug']);
        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        Ministry::create($validated);

        return redirect()->route('admin.ministries.index')
            ->with('success', 'Ministry created successfully.');
    }

    public function show(Ministry $ministry)
    {
        return view('admin.ministries.show', compact('ministry'));
    }

    public function edit(Ministry $ministry)
    {
        return view('admin.ministries.edit', compact('ministry'));
    }

    public function update(MinistryRequest $request, Ministry $ministry)
    {
        $validated = $request->validated();
        $validated['slug'] = $request->input('slug') ?: Ministry::generateUniqueSlug($validated['name']);
        $validated['slug'] = $this->ensureUniqueSlug($validated['slug'], $ministry->id);
        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['sort_order'] = $validated['sort_order'] ?? $ministry->sort_order;

        $ministry->update($validated);

        return redirect()->route('admin.ministries.index')
            ->with('success', 'Ministry updated successfully.');
    }

    public function destroy(Ministry $ministry)
    {
        $ministry->delete();

        return redirect()->route('admin.ministries.index')
            ->with('success', 'Ministry deleted successfully.');
    }

    public function activate(Ministry $ministry)
    {
        $ministry->update(['is_active' => true]);
        return redirect()->back()->with('success', 'Ministry activated successfully.');
    }

    public function deactivate(Ministry $ministry)
    {
        $ministry->update(['is_active' => false]);
        return redirect()->back()->with('success', 'Ministry deactivated successfully.');
    }

    protected function ensureUniqueSlug(string $slug, ?int $ignoreId = null): string
    {
        $originalSlug = $slug;
        $count = 1;

        while (Ministry::where('slug', $slug)->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }
}
