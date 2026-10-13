@php
    $ministryHighlights = [
        [
            'name' => 'Family Ministry',
            'description' => 'Supporting families as they grow in faith, strengthen relationships, and build Christ-centered homes.',
            'details' => 'Family Ministry creates opportunities for households to learn from Scripture, pray together, encourage one another, and find support through the church community.',
            'image' => 'family ministry.jpg',
        ],
        [
            'name' => "Women's Ministry",
            'description' => 'Encouraging women to grow in faith, build meaningful friendships, and use their gifts in service.',
            'details' => 'Through fellowship, prayer, biblical encouragement, and opportunities to serve, women can support one another through different seasons of life and take part in the wider church community.',
            'image' => 'women ministry.jpg',
        ],
        [
            'name' => "Men's Ministry",
            'description' => 'Equipping men to follow Christ, serve faithfully, and encourage their families and communities.',
            'details' => 'Men are encouraged to grow through Scripture, prayer, fellowship, and practical service, developing integrity and a spirit of responsibility in everyday life.',
            'image' => "Men's ministry.jpg",
        ],
        [
            'name' => 'Youth Ministry',
            'description' => 'Helping young people build a strong foundation in Christ and discover how their gifts can serve others.',
            'details' => 'Youth Ministry offers a welcoming place to learn the Bible, grow in prayer, form positive friendships, and talk about living out Christian faith at home, school, and in the community.',
            'image' => 'youth ministry.jpg',
        ],
        [
            'name' => "Children's Ministry",
            'description' => "Helping children understand God's Word and grow in a safe, caring church community.",
            'details' => 'Children are introduced to biblical stories and Christian values through age-appropriate teaching, prayer, worship, and caring relationships with the church family.',
            'image' => 'children ministry.jpg',
        ],
        [
            'name' => 'Worship & Music Ministry',
            'description' => 'Serving the congregation by leading worship and sharing gifts in music and praise.',
            'details' => 'This ministry encourages reverent, joyful worship and helps people use their musical and creative abilities to serve the church and draw attention to God.',
            'image' => 'Worship & Music Ministry.jpg',
        ],
        [
            'name' => 'Prayer Ministry',
            'description' => "Bringing people together to pray for the church, the community, and God's guidance.",
            'details' => 'Prayer is at the heart of the church’s life. This ministry makes space for shared prayer, intercession, encouragement, and seeking wisdom in times of need and decision.',
            'image' => 'Prayer Ministry.jpg',
        ],
        [
            'name' => 'Evangelism & Outreach',
            'description' => 'Sharing the hope of Jesus and showing practical care to people in the community.',
            'details' => 'Outreach invites members to communicate the Gospel with compassion, welcome people into fellowship, and respond to community needs through acts of service.',
            'image' => 'Evangelism & Outreach.jpg',
        ],
    ];
    if (isset($limit)) {
        $ministryHighlights = array_slice($ministryHighlights, 0, $limit);
    }
@endphp

<div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
    @foreach ($ministryHighlights as $ministry)
        <article class="reveal card-premium lift zoom-media group flex h-full flex-col overflow-hidden">
            @if (!empty($ministry['image']))
                <div class="h-52 overflow-hidden">
                    <img src="{{ asset('images/' . $ministry['image']) }}" alt="{{ $ministry['name'] }}" class="h-full w-full object-cover" width="800" height="520" loading="lazy">
                </div>
            @endif
            <div class="flex flex-1 flex-col p-7">
                <h3 class="font-display text-lg font-semibold text-pga-green-deep">{{ $ministry['name'] }}</h3>
                <p class="mt-2 flex-1 text-sm leading-relaxed text-pga-muted">{{ $ministry['description'] }}</p>
                <details class="group/details mt-5">
                    <summary class="footer-link cursor-pointer list-none !text-pga-red-deep">
                        <span class="group-open/details:hidden">Read More</span>
                        <span class="hidden group-open/details:inline">Read less</span>
                        <span aria-hidden="true">&rarr;</span>
                    </summary>
                    <p class="mt-3 text-sm leading-relaxed text-pga-ink/85">{{ $ministry['details'] }}</p>
                </details>
            </div>
        </article>
    @endforeach
</div>
