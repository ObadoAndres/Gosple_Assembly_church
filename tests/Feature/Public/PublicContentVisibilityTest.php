<?php

namespace Tests\Feature\Public;

use App\Models\Event;
use App\Models\Ministry;
use App\Models\Sermon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class PublicContentVisibilityTest extends TestCase
{
    use RefreshDatabase;

    protected function createEvent(array $overrides = []): Event
    {
        return Event::create(array_merge([
            'title' => 'Sample Event ' . Str::random(6),
            'slug' => 'event-' . Str::random(10),
            'starts_at' => now()->addDay(),
            'is_published' => true,
            'published_at' => now()->subMinute(),
        ], $overrides));
    }

    protected function createSermon(array $overrides = []): Sermon
    {
        return Sermon::create(array_merge([
            'title' => 'Sample Sermon ' . Str::random(6),
            'slug' => 'sermon-' . Str::random(10),
            'is_published' => true,
            'published_at' => now()->subMinute(),
        ], $overrides));
    }

    public function test_draft_events_do_not_appear_in_public_listing(): void
    {
        $draft = $this->createEvent([
            'title' => 'Draft Event Title',
            'is_published' => false,
            'published_at' => null,
        ]);

        $response = $this->get(route('events.index'));

        $response->assertOk();
        $response->assertDontSee($draft->title);
        $this->assertFalse(
            $response->viewData('upcoming')->contains('id', $draft->id)
        );
        $this->assertFalse(
            $response->viewData('past')->getCollection()->contains('id', $draft->id)
        );
    }

    public function test_future_scheduled_events_do_not_appear_in_public_listing(): void
    {
        $scheduled = $this->createEvent([
            'title' => 'Future Scheduled Event Title',
            'published_at' => now()->addDay(),
            'starts_at' => now()->addDays(3),
        ]);

        $response = $this->get(route('events.index'));

        $response->assertOk();
        $response->assertDontSee($scheduled->title);
        $this->assertFalse(
            $response->viewData('upcoming')->contains('id', $scheduled->id)
        );
    }

    public function test_future_scheduled_event_detail_returns_not_found(): void
    {
        $scheduled = $this->createEvent([
            'published_at' => now()->addDay(),
            'starts_at' => now()->addDays(3),
        ]);

        $this->get(route('events.show', $scheduled->slug))->assertNotFound();
    }

    public function test_published_upcoming_event_appears_in_upcoming_section(): void
    {
        $event = $this->createEvent([
            'title' => 'Upcoming Published Event',
            'starts_at' => now()->addDays(5),
        ]);

        $response = $this->get(route('events.index'));

        $response->assertOk();
        $response->assertSee($event->title);
        $this->assertTrue(
            $response->viewData('upcoming')->contains('id', $event->id)
        );
        $this->assertFalse(
            $response->viewData('past')->getCollection()->contains('id', $event->id)
        );
    }

    public function test_published_past_event_appears_in_past_section(): void
    {
        $event = $this->createEvent([
            'title' => 'Past Published Event',
            'starts_at' => now()->subDays(5),
        ]);

        $response = $this->get(route('events.index'));

        $response->assertOk();
        $response->assertSee($event->title);
        $this->assertTrue(
            $response->viewData('past')->getCollection()->contains('id', $event->id)
        );
        $this->assertFalse(
            $response->viewData('upcoming')->contains('id', $event->id)
        );
    }

    public function test_event_becomes_visible_when_publication_time_arrives(): void
    {
        $publishAt = now()->addHour();

        $event = $this->createEvent([
            'title' => 'Scheduled To Appear',
            'published_at' => $publishAt,
            'starts_at' => now()->addDays(3),
        ]);

        $this->get(route('events.index'))->assertDontSee($event->title);
        $this->get(route('events.show', $event->slug))->assertNotFound();

        $this->travelTo($publishAt->copy()->addMinute());

        $this->get(route('events.index'))->assertOk()->assertSee($event->title);
        $this->get(route('events.show', $event->slug))->assertOk();
    }

    public function test_homepage_does_not_expose_future_scheduled_events(): void
    {
        $scheduled = $this->createEvent([
            'title' => 'Homepage Hidden Event',
            'published_at' => now()->addDay(),
            'starts_at' => now()->addDays(3),
        ]);

        $this->get(route('home'))->assertOk()->assertDontSee($scheduled->title);
    }

    public function test_homepage_shows_published_upcoming_events(): void
    {
        $event = $this->createEvent([
            'title' => 'Homepage Visible Event',
            'starts_at' => now()->addDays(2),
        ]);

        $this->get(route('home'))->assertOk()->assertSee($event->title);
    }

    public function test_unpublished_sermon_detail_returns_not_found(): void
    {
        $sermon = Sermon::create([
            'title' => 'Draft Sermon',
            'slug' => 'draft-sermon',
            'is_published' => false,
            'published_at' => null,
        ]);

        $this->get(route('sermons.show', $sermon->slug))->assertNotFound();
    }

    public function test_future_scheduled_sermon_detail_returns_not_found(): void
    {
        $sermon = Sermon::create([
            'title' => 'Future Sermon',
            'slug' => 'future-sermon',
            'is_published' => true,
            'published_at' => now()->addDay(),
        ]);

        $this->get(route('sermons.show', $sermon->slug))->assertNotFound();
    }

    public function test_draft_sermons_do_not_appear_in_public_listing(): void
    {
        $draft = $this->createSermon([
            'title' => 'Draft Sermon Listing',
            'is_published' => false,
            'published_at' => null,
        ]);

        $this->get(route('sermons.index'))->assertOk()->assertDontSee($draft->title);
    }

    public function test_future_scheduled_sermons_do_not_appear_in_public_listing(): void
    {
        $scheduled = $this->createSermon([
            'title' => 'Future Sermon Listing',
            'published_at' => now()->addDay(),
        ]);

        $this->get(route('sermons.index'))
            ->assertOk()
            ->assertDontSee($scheduled->title)
            ->assertDontSee($scheduled->slug);
    }

    public function test_homepage_does_not_expose_future_scheduled_sermons(): void
    {
        $scheduled = $this->createSermon([
            'title' => 'Homepage Hidden Sermon',
            'published_at' => now()->addDay(),
            'sermon_date' => now()->format('Y-m-d'),
        ]);

        $this->get(route('home'))->assertOk()->assertDontSee($scheduled->title);
    }

    public function test_published_sermons_appear_in_public_listing_and_detail(): void
    {
        $sermon = $this->createSermon([
            'title' => 'Existing Published Sermon',
            'sermon_date' => now()->subDay()->format('Y-m-d'),
        ]);

        $this->get(route('sermons.index'))->assertOk()->assertSee($sermon->title);
        $this->get(route('sermons.show', $sermon->slug))->assertOk()->assertSee($sermon->title);
    }

    public function test_sermon_listing_can_be_searched_and_filtered_by_category(): void
    {
        $matchingSermon = $this->createSermon([
            'title' => 'Faithful Living',
            'scripture_reference' => 'Proverbs 1:7',
            'preacher' => 'Pastor Example',
            'category' => 'Discipleship',
        ]);
        $otherSermon = $this->createSermon([
            'title' => 'A Different Message',
            'category' => 'Prayer',
        ]);

        $this->get(route('sermons.index', ['search' => 'Proverbs']))
            ->assertOk()
            ->assertSee($matchingSermon->title)
            ->assertDontSee($otherSermon->title);

        $this->get(route('sermons.index', ['category' => 'Prayer']))
            ->assertOk()
            ->assertSee($otherSermon->title)
            ->assertDontSee($matchingSermon->title);
    }

    public function test_sermon_becomes_visible_when_publication_time_arrives(): void
    {
        $publishAt = now()->addHour();

        $sermon = $this->createSermon([
            'title' => 'Scheduled Sermon To Appear',
            'published_at' => $publishAt,
            'sermon_date' => now()->format('Y-m-d'),
        ]);

        $this->get(route('sermons.index'))->assertDontSee($sermon->title);
        $this->get(route('sermons.show', $sermon->slug))->assertNotFound();

        $this->travelTo($publishAt->copy()->addMinute());

        $this->get(route('sermons.index'))->assertOk()->assertSee($sermon->title);
        $this->get(route('sermons.show', $sermon->slug))->assertOk();
    }

    public function test_homepage_shows_latest_published_sermon(): void
    {
        $sermon = $this->createSermon([
            'title' => 'Homepage Visible Sermon',
            'sermon_date' => now()->format('Y-m-d'),
        ]);

        $this->get(route('home'))->assertOk()->assertSee($sermon->title);
    }

    public function test_inactive_ministry_detail_returns_not_found(): void
    {
        $ministry = Ministry::create([
            'name' => 'Inactive Ministry',
            'slug' => 'inactive-ministry',
            'description' => 'Description',
            'is_active' => false,
        ]);

        $this->get(route('ministries.show', $ministry->slug))->assertNotFound();
    }

    public function test_active_ministry_appears_in_public_listing(): void
    {
        $ministry = Ministry::create([
            'name' => 'Active Ministry',
            'slug' => 'active-ministry',
            'description' => 'Description',
            'is_active' => true,
            'sort_order' => 1,
        ]);

        $this->get(route('ministries.index'))->assertOk()->assertSee($ministry->name);
    }
}
