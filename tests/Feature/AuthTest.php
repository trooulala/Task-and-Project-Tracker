<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_login_with_valid_password() {
        $user = User::factory()->create([
            'email' => 'admin@example.com',
            'password' => Hash::make('password')
        ]);

        $response = $this->postJson('api/login', [
            'email' => 'admin@example.com',
            'password' => 'password'
        ]);
        $response->assertStatus(200);

        $response->assertJsonStructure([
            'access_token',
            'user' => [
                'id',
                'name',
                'email',
                'is_admin',
                'email_verified_at',
                'created_at',
                'updated_at'
            ]
        ]);
    }

}
