<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Sermon;

class SermonController extends Controller
{
    public function index()
    {
        $filters = request()->validate([
            'search' => ['nullable', 'string', 'max:100'],
            'category' => ['nullable', 'string', 'max:100'],
        ]);

        $search = trim($filters['search'] ?? '');
        $category = $filters['category'] ?? '';

        $query = Sermon::published()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('title', 'like', '%' . $search . '%')
                        ->orWhere('scripture_reference', 'like', '%' . $search . '%')
                        ->orWhere('preacher', 'like', '%' . $search . '%')
                        ->orWhere('category', 'like', '%' . $search . '%');
                });
            })
            ->when($category !== '', fn ($query) => $query->where('category', $category));

        $sermons = $query
            ->orderBy('sermon_date', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(12)
            ->withQueryString();
        $categories = Sermon::published()
            ->whereNotNull('category')
            ->where('category', '!=', '')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        $youtubeCollections = [
            [
                'title' => 'SUNDAY WORSHIP SERVICE | Philadelphia Full Gospel Assembly',
                'url' => 'https://www.youtube.com/playlist?list=PLC_PnAYD9FzIj4M4i62mDjACtVn--Kqz9',
                'image' => 'https://i.ytimg.com/vi/XGb_14TKXPw/hqdefault.jpg',
                'image_alt' => 'Sunday worship service video thumbnail',
            ],
            [
                'title' => 'WEDNESDAY WORSHIP SERVICE | Philadelphia Full Gospel Assembly',
                'url' => 'https://www.youtube.com/playlist?list=PLC_PnAYD9FzJQDNCdnzL1GLiL7SEJZUrM',
                'image' => 'https://i.ytimg.com/vi/jjMHdZbP6A0/hqdefault.jpg',
                'image_alt' => 'Wednesday worship service video thumbnail',
            ],
            [
                'title' => 'SATURDAY WORSHIP SERVICE | Philadelphia Full Gospel Assembly',
                'url' => 'https://www.youtube.com/playlist?list=PLC_PnAYD9FzJFz_gG-tYvThNYSWdjKKQv',
                'image' => 'https://i.ytimg.com/vi/BrQQ4wa7yXE/hqdefault.jpg',
                'image_alt' => 'Saturday worship service video thumbnail',
            ],
            [
                'title' => 'Past live streams',
                'url' => 'https://www.youtube.com/@PhiladelphiaFullGospelAssembly/videos?view=2&sort=dd&live_view=503&shelf_id=5',
                'image' => 'https://i.ytimg.com/vi/XGb_14TKXPw/hqdefault.jpg',
                'image_alt' => 'Recent Philadelphia Full Gospel Assembly live stream',
            ],
            [
                'title' => 'SPECIAL MEETINGS | Philadelphia Full Gospel Assembly',
                'url' => 'https://www.youtube.com/playlist?list=PLC_PnAYD9FzLwqG9exHjS8pyax3JFGc3S',
                'image' => 'https://i.ytimg.com/vi/jYWKbkXXoYE/hqdefault.jpg',
                'image_alt' => 'Special meetings video thumbnail',
            ],
            [
                'title' => '21 DAYS FASTING & PRAYER | Philadelphia Full Gospel Assembly',
                'url' => 'https://www.youtube.com/playlist?list=PLC_PnAYD9FzLtdxh0HkvNqxtJ3tdseJvn',
                'image' => 'https://i.ytimg.com/vi/yZhNp1C9NU4/hqdefault.jpg',
                'image_alt' => '21 days fasting and prayer video thumbnail',
            ],
            [
                'title' => '07 DAYS FASTING & PRAYER | Philadelphia Full Gospel Assembly',
                'url' => 'https://www.youtube.com/playlist?list=PLC_PnAYD9FzIVSZg8JI1OhT4Lc8ggGvmX',
                'image' => 'https://i.ytimg.com/vi/3sIopV4SFC0/hqdefault.jpg',
                'image_alt' => 'Seven days fasting and prayer video thumbnail',
            ],
            [
                'title' => 'FASTING & PRAYER | Philadelphia Full Gospel Assembly',
                'url' => 'https://www.youtube.com/playlist?list=PLC_PnAYD9FzIGqs5BvesOLo0LnGCx289C',
                'image' => 'https://i.ytimg.com/vi/nc3TZf633Mg/hqdefault.jpg',
                'image_alt' => 'Fasting prayer meeting video thumbnail',
            ],
        ];

        return view('public.sermons.index', compact('sermons', 'categories', 'search', 'category', 'youtubeCollections'));
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
