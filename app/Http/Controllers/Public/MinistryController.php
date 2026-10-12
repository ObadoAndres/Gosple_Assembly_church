<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Ministry;

class MinistryController extends Controller
{
    public function index()
    {
        $ministries = Ministry::active()
            ->ordered()
            ->get();

        return view('public.ministries.index', compact('ministries'));
    }

    public function show($slug)
    {
        $ministry = Ministry::where('slug', $slug)
            ->where('is_active', true)
            ->first();

        if (!$ministry) {
            abort(404);
        }

        return view('public.ministries.show', compact('ministry'));
    }
}
