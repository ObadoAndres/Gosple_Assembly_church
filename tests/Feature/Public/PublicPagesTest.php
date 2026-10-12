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

    public function test_services_page_has_no_corrupted_characters(): void
    {
        $response = $this->get('/services');

        $response->assertOk();
        $response->assertDontSee("\u{FFFD}", false);
        $response->assertSee('To be confirmed', false);
    }

    public function test_home_page_uses_verified_intro_image_and_paths(): void
    {
        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('images/Arch%20Bishop%20Prof%20Yohana%20Simon%20Masinga.png', false);
        $response->assertSee(route('about'), false);
        $response->assertSee(route('sermons.index'), false);
        $response->assertSee(route('events.index'), false);
        $response->assertSee(route('contact'), false);
    }

    public function test_ministries_page_integrates_skills_training_images(): void
    {
        $response = $this->get('/ministries');

        $response->assertOk();
        $response->assertSee('images/capentry%20and%20wooding.png', false);
        $response->assertSee('images/Tailor%20and%20sewing.png', false);
        $response->assertSee('Skills Training', false);
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
