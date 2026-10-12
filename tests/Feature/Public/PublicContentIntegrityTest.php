<?php

namespace Tests\Feature\Public;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicContentIntegrityTest extends TestCase
{
    use RefreshDatabase;

    private const PUBLIC_PATHS = [
        '/',
        '/about',
        '/vision-mission',
        '/leadership',
        '/services',
        '/giving',
        '/contact',
        '/sermons',
        '/events',
        '/ministries',
    ];

    public function test_key_public_pages_return_successful_responses(): void
    {
        foreach (self::PUBLIC_PATHS as $path) {
            $this->get($path)->assertOk();
        }
    }

    public function test_unverified_historical_statistics_are_not_published(): void
    {
        foreach (self::PUBLIC_PATHS as $path) {
            $response = $this->get($path);

            $response->assertOk();
            $response->assertDontSee('700 churches', false);
            $response->assertDontSee('9,800', false);
            $response->assertDontSee('640 pastors', false);
        }
    }

    public function test_about_page_lists_all_core_objectives_a_to_l(): void
    {
        $objectives = [
            'Spiritual Development',
            'Church Development',
            'Leadership Development',
            'Intellectual Development',
            'Educational Development and Schools',
            'Theological and Biblical Education',
            'Health and Medical Services',
            'Physical and Community Development',
            'Youth Empowerment',
            'Social Responsibility',
            'Evangelism and Missions',
            'Community Transformation',
        ];

        $response = $this->get('/about');
        $response->assertOk();

        foreach ($objectives as $objective) {
            $response->assertSee($objective, false);
        }
    }

    public function test_about_page_presents_geographical_and_international_outlook(): void
    {
        $response = $this->get('/about');
        $response->assertOk();

        $terms = [
            'Burundi',
            'Democratic Republic of Congo (DRC)',
            'Namibia',
            'Botswana',
            'Philippines',
            'Tanzania',
            'Africa',
            'Asia',
            'global family of believers',
        ];

        foreach ($terms as $term) {
            $response->assertSee($term, false);
        }
    }
}
