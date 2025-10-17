<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\submissions;

class SubmissionControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_view_submissions_list(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)->get('/admin/submissions');

        $response->assertStatus(200);
    }

    public function test_admin_can_view_single_submission(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $submission = submissions::factory()->create();

        $response = $this->actingAs($admin)->get("/admin/submissions/{$submission->id}");

        $response->assertStatus(200);
        $response->assertSee($submission->name);
        $response->assertSee($submission->email);
    }

    public function test_admin_can_delete_submission(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $submission = submissions::factory()->create();

        $response = $this->actingAs($admin)->delete("/admin/submissions/{$submission->id}");

        $response->assertRedirect('/admin/submissions');
        $this->assertDatabaseMissing('submissions', [
            'id' => $submission->id,
        ]);
    }

    public function test_regular_user_cannot_access_submissions_management(): void
    {
        $user = User::factory()->create(['role' => 'user']);

        $response = $this->actingAs($user)->get('/admin/submissions');

        $response->assertStatus(403);
    }
}
