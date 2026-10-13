<?php

namespace Tests\Feature\Public;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_about_page_renders_verified_content(): void
    {
        $response = $this->get('/about');

        $response->assertOk();
        $response->assertSee('Pentecostal', false);
        $response->assertSee('Arch Bishop Prof. Yohana Simon Masinga', false);
        $response->assertSee('28 January 1992', false);
        $response->assertSee('Philadelphia Bible College', false);
        $response->assertSee('Dodoma, Area C, Wajenzi', false);
        $response->assertSee('Philadelphia tunasonga mbele, Bwana yu pamoja nasi.', false);
        $response->assertSee('images/Arch%20Bishop%20Prof%20Yohana%20Simon%20Masinga.png', false);
    }

    public function test_vision_mission_page_renders_official_wording(): void
    {
        $response = $this->get('/vision-mission');

        $response->assertOk();
        $response->assertSee('To build a strong and united Body of Christ that transforms individuals, families,', false);
        $response->assertSee('Empower young people through practical skills and self-employment initiatives.', false);
        $response->assertSee('Service to communities and people in need.', false);
    }

    public function test_leadership_page_renders_founder_and_philosophy(): void
    {
        $response = $this->get('/leadership');

        $response->assertOk();
        $response->assertSee('Founder', false);
        $response->assertSee('Pastor Grace Masinga', false);
        $response->assertSee('Kanisa ni Mali ya Yesu Kristo si Mali ya mtu yeyote.', false);
    }

    public function test_services_page_shows_the_weekly_timetable_in_both_clock_systems(): void
    {
        $response = $this->get('/services');

        $response->assertOk();
        $response->assertDontSee("\u{FFFD}", false);

        foreach ([
            'Jumapili (Sunday)',
            'Sunday School',
            '3:00-4:00 asubuhi',
            '9:00-10:00 AM',
            'Ibada Kuu (Main Service)',
            '4:00-6:00 mchana',
            '10:00 AM-12:00 PM',
            'Praise and Worship',
            '10:30-12:00 jioni',
            '4:30-6:00 PM',
            'Jumatatu (Monday)',
            'Maombi (Prayer)',
            'Jumanne (Tuesday)',
            'Kwaya (Choir)',
            'Jumatano (Wednesday)',
            'Vijana (Youth)',
            'Alhamisi (Thursday)',
            'Mafundisho (Teaching)',
            'Ijumaa (Friday)',
            "Wanawake (Women's Fellowship)",
            'Mkesha (Overnight Prayer Vigil)',
            '9:30 PM-3:00 AM (Saturday)',
            'Jumamosi (Saturday)',
        ] as $scheduleItem) {
            $response->assertSee($scheduleItem, false);
        }

        $response->assertDontSee('Conflicting service times', false);
        $response->assertDontSee('To be confirmed', false);
    }

    public function test_home_page_uses_hero_background_and_verified_paths(): void
    {
        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('images/hero.jpg', false);
        $response->assertDontSee('images/Arch%20Bishop%20Prof%20Yohana%20Simon%20Masinga.png', false);
        $response->assertSee(route('about'), false);
        $response->assertSee(route('sermons.index'), false);
        $response->assertSee(route('events.index'), false);
        $response->assertSee(route('contact'), false);
        $response->assertSee('Join Us This Sunday', false);
        $response->assertSee('There is always a place to gather', false);
        $response->assertSee('Our Ministries', false);
        $response->assertSee(route('ministries.index'), false);
        $response->assertSee('Family Ministry', false);
        $response->assertSee('Women&#039;s Ministry', false);
        $response->assertSee('Men&#039;s Ministry', false);
        $response->assertDontSee('Youth Ministry', false);
        $response->assertSee('Give &amp; Make a Difference', false);
        $response->assertDontSee('8:00 AM - 5:00 PM', false);
        $response->assertDontSee('9:00 AM - 12:00 PM', false);
    }

    public function test_home_page_shows_only_three_active_ministries_and_links_to_full_details(): void
    {
        foreach ([
            ['name' => 'First Ministry', 'slug' => 'first-ministry', 'sort_order' => 1],
            ['name' => 'Second Ministry', 'slug' => 'second-ministry', 'sort_order' => 2],
            ['name' => 'Third Ministry', 'slug' => 'third-ministry', 'sort_order' => 3],
            ['name' => 'Fourth Ministry', 'slug' => 'fourth-ministry', 'sort_order' => 4],
        ] as $ministry) {
            \App\Models\Ministry::create(array_merge($ministry, [
                'description' => $ministry['name'] . ' description.',
                'is_active' => true,
            ]));
        }

        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('First Ministry', false);
        $response->assertSee('Second Ministry', false);
        $response->assertSee('Third Ministry', false);
        $response->assertDontSee('Fourth Ministry', false);
        $response->assertSee(route('ministries.show', 'first-ministry'), false);
        $response->assertSee(route('ministries.index'), false);
    }

    public function test_home_page_event_cards_include_read_more_links(): void
    {
        \App\Models\Event::create([
            'title' => 'Community Fellowship',
            'slug' => 'community-fellowship',
            'description' => 'Join us for a day of worship, fellowship, prayer, and community service.',
            'location' => 'Dodoma',
            'starts_at' => now()->addWeek(),
            'is_published' => true,
        ]);

        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('Community Fellowship', false);
        $response->assertSee('Read More', false);
        $response->assertSee(route('events.show', 'community-fellowship'), false);
    }

    public function test_sermons_page_links_youtube_images_to_church_video_collections(): void
    {
        $response = $this->get('/sermons');

        $response->assertOk();
        $response->assertSee('Watch on YouTube', false);
        $response->assertSee('SUNDAY WORSHIP SERVICE | Philadelphia Full Gospel Assembly', false);
        $response->assertSee('WEDNESDAY WORSHIP SERVICE | Philadelphia Full Gospel Assembly', false);
        $response->assertSee('SATURDAY WORSHIP SERVICE | Philadelphia Full Gospel Assembly', false);
        $response->assertSee('Past live streams', false);
        $response->assertSee('SPECIAL MEETINGS | Philadelphia Full Gospel Assembly', false);
        $response->assertSee('21 DAYS FASTING &amp; PRAYER | Philadelphia Full Gospel Assembly', false);
        $response->assertSee('07 DAYS FASTING &amp; PRAYER | Philadelphia Full Gospel Assembly', false);
        $response->assertSee('FASTING &amp; PRAYER | Philadelphia Full Gospel Assembly', false);
        $response->assertSee('https://www.youtube.com/playlist?list=PLC_PnAYD9FzIj4M4i62mDjACtVn--Kqz9', false);
        $response->assertSee('https://www.youtube.com/playlist?list=PLC_PnAYD9FzJQDNCdnzL1GLiL7SEJZUrM', false);
        $response->assertSee('https://www.youtube.com/playlist?list=PLC_PnAYD9FzJFz_gG-tYvThNYSWdjKKQv', false);
        $response->assertSee('https://www.youtube.com/playlist?list=PLC_PnAYD9FzLwqG9exHjS8pyax3JFGc3S', false);
        $response->assertSee('https://www.youtube.com/playlist?list=PLC_PnAYD9FzLtdxh0HkvNqxtJ3tdseJvn', false);
        $response->assertSee('https://www.youtube.com/playlist?list=PLC_PnAYD9FzIVSZg8JI1OhT4Lc8ggGvmX', false);
        $response->assertSee('https://www.youtube.com/playlist?list=PLC_PnAYD9FzIGqs5BvesOLo0LnGCx289C', false);
        $response->assertSee('https://i.ytimg.com/vi/XGb_14TKXPw/hqdefault.jpg', false);
        $response->assertSee('https://i.ytimg.com/vi/jjMHdZbP6A0/hqdefault.jpg', false);
        $response->assertSee('https://i.ytimg.com/vi/jYWKbkXXoYE/hqdefault.jpg', false);
        $response->assertSee('https://i.ytimg.com/vi/BrQQ4wa7yXE/hqdefault.jpg', false);
        $response->assertSee('https://i.ytimg.com/vi/3sIopV4SFC0/hqdefault.jpg', false);
        $response->assertSee('https://i.ytimg.com/vi/yZhNp1C9NU4/hqdefault.jpg', false);
        $response->assertSee('https://i.ytimg.com/vi/nc3TZf633Mg/hqdefault.jpg', false);
    }

    public function test_ministries_page_integrates_skills_training_images(): void
    {
        $response = $this->get('/ministries');

        $response->assertOk();
        $response->assertSee('images/capentry%20and%20wooding.png', false);
        $response->assertSee('images/Tailor%20and%20sewing.png', false);
        $response->assertSee('Skills Training', false);
        $response->assertSee('Our Objectives', false);
        $response->assertSee('What We Do', false);
        $response->assertSee('Read More', false);
        $response->assertSee('Family Ministry creates opportunities for households', false);
        $response->assertSee('Evangelism &amp; Outreach', false);
    }

    public function test_ministries_page_shows_the_supplied_ministry_information_when_no_records_exist(): void
    {
        $response = $this->get('/ministries');

        $response->assertOk();
        $response->assertSee('Family Ministry', false);
        $response->assertSee("Women&#039;s Ministry", false);
        $response->assertSee("Men&#039;s Ministry", false);
        $response->assertSee('Youth Ministry', false);
        $response->assertSee("Children&#039;s Ministry", false);
        $response->assertSee('Worship &amp; Music Ministry', false);
        $response->assertSee('Prayer Ministry', false);
        $response->assertSee('Evangelism &amp; Outreach', false);
    }

    public function test_giving_page_does_not_pretend_unconfirmed_online_giving_is_available(): void
    {
        $response = $this->get('/giving');

        $response->assertOk();
        $response->assertSee('2 Corinthians 9:7', false);
        $response->assertSee('Online payment details and giving instructions will be published once confirmed', false);
        $response->assertDontSee('Give Online', false);
    }

    public function test_contact_page_links_to_the_verified_location_on_google_maps(): void
    {
        $response = $this->get('/contact');

        $response->assertOk();
        $response->assertSee('RQV2+7QX, Dodoma', false);
        $response->assertSee('https://www.google.com/maps/search/', false);
        $response->assertSee('philadeliphiagospelassembly@gmail.com', false);
        $response->assertSee('+255 757 452 410', false);
        $response->assertSee('+255 784 993 496', false);
        $response->assertSee('+255 784 925 922', false);
        $response->assertDontSee('A church phone number and email address have not yet been confirmed', false);
    }

    public function test_remaining_public_views_have_no_corrupted_arrow_placeholders(): void
    {
        $files = [
            resource_path('views/public/sermons/index.blade.php'),
            resource_path('views/public/sermons/show.blade.php'),
            resource_path('views/public/events/index.blade.php'),
            resource_path('views/public/events/show.blade.php'),
            resource_path('views/public/ministries/index.blade.php'),
            resource_path('views/public/ministries/show.blade.php'),
        ];

        foreach ($files as $file) {
            $contents = file_get_contents($file);

            $this->assertStringNotContainsString(' ?</a>', $contents, $file);
            $this->assertStringNotContainsString('">? ', $contents, $file);
        }
    }
}
