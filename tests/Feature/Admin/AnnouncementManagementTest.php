<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use App\Models\Announcement;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AnnouncementManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_access_announcements_admin(): void
    {
        $response = $this->get('/admin/announcements');
        $response->assertRedirect(route('login'));
    }

    public function test_non_admin_cannot_access_announcements_admin(): void
    {
        $user = User::factory()->create(['is_admin' => false]);
        $response = $this->actingAs($user)->get('/admin/announcements');
        $response->assertForbidden();
    }

    public function test_admin_can_create_announcement(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $response = $this->actingAs($admin)->post('/admin/announcements', [
            'title' => 'Test Announcement',
            'body' => 'Body text',
            'is_published' => true,
        ]);
        $response->assertRedirect('/admin/announcements');
        $this->assertDatabaseHas('announcements', ['title' => 'Test Announcement', 'is_published' => true]);
    }

    public function test_duplicate_slugs_handled(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        Announcement::create(['title' => 'Same', 'slug' => 'same', 'body' => 'b']);
        $response = $this->actingAs($admin)->post('/admin/announcements', ['title' => 'Same', 'body' => 'b']);
        $response->assertRedirect('/admin/announcements');
        $this->assertDatabaseHas('announcements', ['title' => 'Same', 'slug' => 'same-1']);
    }

    public function test_publish_unpublish(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $announcement = Announcement::create(['title' => 'A', 'slug' => 'a', 'body' => 'b', 'is_published' => false]);
        $this->actingAs($admin)->post("/admin/announcements/{$announcement->id}/publish");
        $this->assertDatabaseHas('announcements', ['id' => $announcement->id, 'is_published' => true]);
        $this->actingAs($admin)->post("/admin/announcements/{$announcement->id}/unpublish");
        $this->assertDatabaseHas('announcements', ['id' => $announcement->id, 'is_published' => false]);
    }

    public function test_public_scope_filters_correctly(): void
    {
        Announcement::create(['title' => 'Draft', 'slug' => 'draft', 'body' => 'b', 'is_published' => false]);
        Announcement::create(['title' => 'Live', 'slug' => 'live', 'body' => 'b', 'is_published' => true]);
        Announcement::create(['title' => 'Expired', 'slug' => 'expired', 'body' => 'b', 'is_published' => true, 'expires_at' => now()->subHour()]);
        Announcement::create(['title' => 'Future', 'slug' => 'future', 'body' => 'b', 'is_published' => true, 'published_at' => now()->addHour()]);
        $this->assertEquals(1, Announcement::published()->count());
    }
}
