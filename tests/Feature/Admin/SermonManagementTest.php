<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use App\Models\Sermon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SermonManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_access_sermons_admin(): void
    {
        $response = $this->get('/admin/sermons');
        $response->assertRedirect(route('login'));
    }

    public function test_non_admin_cannot_access_sermons_admin(): void
    {
        $user = User::factory()->create(['is_admin' => false]);
        $response = $this->actingAs($user)->get('/admin/sermons');
        $response->assertForbidden();
    }

    public function test_admin_can_view_sermons_index(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $response = $this->actingAs($admin)->get('/admin/sermons');
        $response->assertOk();
    }

    public function test_admin_can_create_sermon(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $response = $this->actingAs($admin)->post('/admin/sermons', [
            'title' => 'Test Sermon',
            'description' => 'A test sermon',
            'is_published' => true,
        ]);

        $response->assertRedirect('/admin/sermons');
        $this->assertDatabaseHas('sermons', [
            'title' => 'Test Sermon',
            'is_published' => true,
        ]);
    }

    public function test_admin_can_edit_sermon(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $sermon = Sermon::create([
            'title' => 'Original Title',
            'slug' => 'original-title',
            'is_published' => false,
        ]);

        $response = $this->actingAs($admin)->put("/admin/sermons/{$sermon->id}", [
            'title' => 'Updated Title',
        ]);

        $response->assertRedirect('/admin/sermons');
        $this->assertDatabaseHas('sermons', [
            'id' => $sermon->id,
            'title' => 'Updated Title',
        ]);
    }

    public function test_admin_can_publish_and_unpublish_sermon(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $sermon = Sermon::create([
            'title' => 'Unpublished',
            'slug' => 'unpublished',
            'is_published' => false,
        ]);

        $response = $this->actingAs($admin)->post("/admin/sermons/{$sermon->id}/publish");
        $response->assertRedirect();
        $this->assertDatabaseHas('sermons', [
            'id' => $sermon->id,
            'is_published' => true,
        ]);

        $response = $this->actingAs($admin)->post("/admin/sermons/{$sermon->id}/unpublish");
        $response->assertRedirect();
        $this->assertDatabaseHas('sermons', [
            'id' => $sermon->id,
            'is_published' => false,
        ]);
    }

    public function test_admin_can_delete_sermon(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $sermon = Sermon::create([
            'title' => 'To Delete',
            'slug' => 'to-delete',
            'is_published' => false,
        ]);

        $response = $this->actingAs($admin)->delete("/admin/sermons/{$sermon->id}");
        $response->assertRedirect('/admin/sermons');
        $this->assertDatabaseMissing('sermons', ['id' => $sermon->id]);
    }

    public function test_validation_rejects_invalid_input(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $response = $this->actingAs($admin)->post('/admin/sermons', []);
        $response->assertSessionHasErrors(['title']);
    }

    public function test_duplicate_slugs_handled_safely(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        Sermon::create(['title' => 'Same Title', 'slug' => 'same-title']);
        $response = $this->actingAs($admin)->post('/admin/sermons', ['title' => 'Same Title']);
        $response->assertRedirect('/admin/sermons');
        $this->assertDatabaseHas('sermons', ['title' => 'Same Title', 'slug' => 'same-title-1']);
    }

    public function test_unpublished_sermons_not_publicly_accessible(): void
    {
        $sermon = Sermon::create([
            'title' => 'Draft Sermon',
            'slug' => 'draft-sermon',
            'is_published' => false,
        ]);
        $this->assertNull(Sermon::published()->find($sermon->id));
    }
}
