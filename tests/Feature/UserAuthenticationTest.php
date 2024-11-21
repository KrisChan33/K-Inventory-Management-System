<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserAuthenticationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $users = User::factory()->count(10)->create();

    if ($users->count() > 0) {
        $response = $this->get('/');
        $response->assertStatus(200);
        
        print("Users found in the database.");
    }
}
        }