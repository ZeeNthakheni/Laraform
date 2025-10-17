<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\submissions;

class AdminSubmissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_view_submissions_list(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        submissions::factory()->count(3)->create();

        $response = $this->actingAs($admin)->get('/admin/submissions');
        
        $response->assertStatus(200);
        $response->assertSee('All Submissions');
    }

    public function test_regular_user_cannot_view_submissions_list(): void
    {
        $user = User::factory()->create(['is_admin' => false]);
        
        $response = $this->actingAs($user)->get('/admin/submissions');
        $response->assertStatus(403);
    }

    public function test_admin_can_create_submission(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $submissionData = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'message' => 'This is a test message.',
        ];

        $response = $this->actingAs($admin)->post('/admin/submissions', $submissionData);
        
        $response->assertRedirect('/admin/submissions');
        $this->assertDatabaseHas('submissions', $submissionData);
    }

    public function test_admin_can_view_single_submission(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $submission = submissions::factory()->create();

        $response = $this->actingAs($admin)->get("/admin/submissions/{$submission->id}");
        
        $response->assertStatus(200);
        $response->assertSee($submission->name);
        $response->assertSee($submission->email);
    }

    public function test_admin_can_update_submission(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $submission = submissions::factory()->create();

        $updatedData = [
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
            'message' => 'Updated message.',
        ];

        $response = $this->actingAs($admin)->put("/admin/submissions/{$submission->id}", $updatedData);
        
        $response->assertRedirect('/admin/submissions');
        $this->assertDatabaseHas('submissions', $updatedData);
    }

    public function test_admin_can_delete_submission(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $submission = submissions::factory()->create();

        $response = $this->actingAs($admin)->delete("/admin/submissions/{$submission->id}");
        
        $response->assertRedirect('/admin/submissions');
        $this->assertDatabaseMissing('submissions', ['id' => $submission->id]);
    }

    public function test_submission_validation_works(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)->post('/admin/submissions', [
            'name' => '',
            'email' => 'invalid-email',
            'message' => '',
        ]);

        $response->assertSessionHasErrors(['name', 'email', 'message']);
    }
}
