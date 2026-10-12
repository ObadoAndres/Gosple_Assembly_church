<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use App\Models\Ministry;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MinistryManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_access_ministries_admin(): void
    {
        $response = $this->get('/admin/ministries');
        $response->assertRedirect(route('login'));
    }

    public function test_non_admin_cannot_access_ministries_admin(): void
    {
        $user = User::factory()->create(['is_admin' => false]);
        $response = $this->actingAs($user)->get('/admin/ministries');
        $response->assertForbidden();
    }

    public function test_admin_can_create_ministry(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $response = $this->actingAs($admin)->post('/admin/ministries', [
            'name' => 'Youth Ministry',
            'description' => 'Ministry for youth',
            'is_active' => true,
        ]);

        $response->assertRedirect('/admin/ministries');
        $this->assertDatabaseHas('ministries', [
            'name' => 'Youth Ministry',
            'is_active' => true,
        ]);
    }

    public function test_duplicate_slugs_handled(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        Ministry::create([
            'name' => 'Same',
            'slug' => 'same',
            'description' => 'd',
        ]);
        $response = $this->actingAs($admin)->post('/admin/ministries', [
            'name' => 'Same',
            'description' => 'd',
        ]);
        $response->assertRedirect('/admin/ministries');
        $this->assertDatabaseHas('ministries', ['name' => 'Same', 'slug' => 'same-1']);
    }

    public function test_activate_deactivate(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $ministry = Ministry::create([
            'name' => 'M',
            'slug' => 'm',
            'description' => 'd',
            'is_active' => false,
        ]);
        $this->actingAs($admin)->post("/admin/ministries/{$ministry->id}/activate");
        $this->assertDatabaseHas('ministries', ['id' => $ministry->id, 'is_active' => true]);
        $this->actingAs($admin)->post("/admin/ministries/{$ministry->id}/deactivate");
        $this->assertDatabaseHas('ministries', ['id' => $ministry->id, 'is_active' => false]);
    }

    public function test_active_only_scope(): void
    {
        Ministry::create(['name' => 'A', 'slug' => 'a', 'description' => 'd', 'is_active' => true]);
        Ministry::create(['name' => 'B', 'slug' => 'b', 'description' => 'd', 'is_active' => false]);
        $this->assertEquals(1, Ministry::active()->count());
    }
}
