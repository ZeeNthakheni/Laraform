<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\submissions;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_is_not_accessible_to_guests(): void
    {
        $response = $this->get('/admin/dashboard');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_dashboard_is_not_accessible_to_regular_users(): void
    {
        $user = User::factory()->create(['is_admin' => false]);

        $response = $this->actingAs($user)->get('/admin/dashboard');
        $response->assertStatus(403);
    }

    public function test_dashboard_is_accessible_to_admin_users(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)->get('/admin/dashboard');
        $response->assertStatus(200);
    }

    public function test_dashboard_displays_correct_statistics(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        submissions::factory()->count(5)->create();

        $response = $this->actingAs($admin)->get('/admin/dashboard');
        
        $response->assertStatus(200);
        $response->assertSee('Total Submissions');
        $response->assertSee('5');
    }
}
