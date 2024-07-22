<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TestimoniTest extends TestCase
{
    public function test_view_testimoni(): void
    {
        $user = User::where('email','mkd.design@gmail.com')-> first();
        $response = $this->actingAs($user)
        ->withSession(['_token' => 'bzz'])
        ->get('/testimoni');

        $response->assertStatus(200);
        $response->assertSeeText('Testimoni');

    }
}
