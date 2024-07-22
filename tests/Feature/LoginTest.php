<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
     public function test_login(): void
    {
        $user = User::where('email','mkd.design@gmail.com')-> first();
        $response = $this->withSession(['_token' => 'bzz'])
        ->postJson('/login', [
            '_token' => 'bzz',
            'email' => 'mkd.design@gmail.com',
            'password' => '87654321',
        ]);

        $this->assertAuthenticatedAs($user);
    }
}
