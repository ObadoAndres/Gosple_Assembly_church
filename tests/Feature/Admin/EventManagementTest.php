<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EventManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_access_events_admin(): void
    {
        $response = $this->get('/admin/events');
        $response->assertRedirect(route('login'));
    }

    public function test_non_admin_cannot_access_events_admin(): void
    {
        $user = User::factory()->create(['is_admin' => false]);
        $response = $this->actingAs($user)->get('/admin/events');
        $response->assertForbidden();
    }

    public function test_admin_can_create_event(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $response = $this->actingAs($admin)->post('/admin/events', [
            'title' => 'Test Event',
            'starts_at' => now()->addDay()->format('Y-m-d\TH:i'),
            'is_published' => true,
        ]);

        $response->assertRedirect('/admin/events');
        $this->assertDatabaseHas('events', [
            'title' => 'Test Event',
            'is_published' => true,
        ]);
    }

    public function test_invalid_dates_rejected(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $response = $this->actingAs($admin)->post('/admin/events', [
            'title' => 'Test Event',
            'starts_at' => now()->format('Y-m-d\TH:i'),
            'ends_at' => now()->subHour()->format('Y-m-d\TH:i'),
        ]);
        $response->assertSessionHasErrors('ends_at');
    }

    public function test_duplicate_slugs_handled(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        Event::create([
            'title' => 'Same Event',
            'slug' => 'same-event',
            'starts_at' => now(),
        ]);
        $response = $this->actingAs($admin)->post('/admin/events', [
            'title' => 'Same Event',
            'starts_at' => now()->addDay(),
        ]);
        $response->assertRedirect('/admin/events');
        $this->assertDatabaseHas('events', ['title' => 'Same Event', 'slug' => 'same-event-1']);
    }

    public function test_publish_unpublish(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $event = Event::create([
            'title' => 'E',
            'slug' => 'e',
            'starts_at' => now(),
            'is_published' => false,
        ]);
        $this->actingAs($admin)->post("/admin/events/{$event->id}/publish");
        $this->assertDatabaseHas('events', ['id' => $event->id, 'is_published' => true]);
        $this->actingAs($admin)->post("/admin/events/{$event->id}/unpublish");
        $this->assertDatabaseHas('events', ['id' => $event->id, 'is_published' => false]);
    }

    public function test_unpublished_not_in_public_scope(): void
    {
        $event = Event::create([
            'title' => 'Draft',
            'slug' => 'draft',
            'starts_at' => now(),
            'is_published' => false,
        ]);
        $this->assertNull(Event::published()->find($event->id));
    }
}
