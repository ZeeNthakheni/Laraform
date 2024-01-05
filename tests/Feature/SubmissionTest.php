<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\submissions;


class SubmissionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_database_is_writable(): void
    {
        $post = submissions::factory()->create();
        $this->assertDatabaseHas('submissions', ['name' => $post->name, 'email' => $post->email, 'message' => $post->message,]);
    }
    public function test_form_submissions_work(): void
    {
        $post = submissions::factory()->create();

        $response = $this->post('/submit', ['name' => $post->name, 'email' => $post->email, 'message' => $post->message,]);
        $response->assertValid(['name', 'email', 'message']);
    }
    
    public function test_that_empty_submissions_dont__work(): void
    {
        $response = $this->post('/submit');
        $response->assertInvalid(['name', 'email', 'message']);
    }




}
