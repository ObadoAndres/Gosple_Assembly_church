<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Sermon;

class SermonController extends Controller
{
    public function index()
    {
        $sermons = Sermon::published()
            ->orderBy('sermon_date', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(12);

        return view('public.sermons.index', compact('sermons'));
    }

    public function show($slug)
    {
        $sermon = Sermon::where('slug', $slug)->first();

        if (!$sermon || !$sermon->is_published ||
            ($sermon->published_at && $sermon->published_at->gt(now()))) {
            abort(404);
        }

        return view('public.sermons.show', compact('sermon'));
    }
}
