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

    public function test_admin_can_access_dashboard(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)->get('/admin/dashboard');

        $response->assertStatus(200);
    }

    public function test_regular_user_cannot_access_dashboard(): void
    {
        $user = User::factory()->create(['role' => 'user']);

        $response = $this->actingAs($user)->get('/admin/dashboard');

        $response->assertStatus(403);
    }

    public function test_guest_cannot_access_dashboard(): void
    {
        $response = $this->get('/admin/dashboard');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_dashboard_displays_statistics(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        User::factory()->count(5)->create();
        submissions::factory()->count(3)->create();

        $response = $this->actingAs($admin)->get('/admin/dashboard');

        $response->assertStatus(200);
        $response->assertViewHas('totalUsers');
        $response->assertViewHas('totalSubmissions');
    }
}
