<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CourseTest extends TestCase
{
   use RefreshDatabase;
   public function test_admin_can_create_course()
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)->post('/courses', [
            'title' => 'Learing System management',
            'description' => 'system to handle learning operation.',
        ]);

        $response->assertStatus(302); // redirected after successful creation
        $this->assertDatabaseHas('courses', ['title' => 'Learing System management']);
    }
    public function test_user_cannot_create_course()
    {
        $user = User::factory()->create(['is_admin' => false]);

        $response = $this->actingAs($user)->post('/courses', [
            'title' => 'Learing System management',
            'description' => 'system to handle learning operation.',
        ]);

        $response->assertStatus(403); // forbidden
    }
}
