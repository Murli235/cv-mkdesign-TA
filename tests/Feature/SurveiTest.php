<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SurveiTest extends TestCase
{
    public function test_view_survei(): void
    {
        $user = User::where('email','mkd.design@gmail.com')-> first();
        $response = $this->actingAs($user)
        ->withSession(['_token' => 'bzz'])
        ->get('/survei');

        $response->assertStatus(200);
        $response->assertSeeText('Survei');

    }
    public function test_create_survei(): void
    {
        $user = User::where('email','mkd.design@gmail.com')-> first();
        $response = $this->actingAs($user)
        ->withSession(['_token' => 'bzz'])
        ->postJson(route('survei.store'), [
            '_token' => 'bzz',
            "name" => "Ana",
            "email" => "murliana235@gmail.com",
            "phone" => "0876543212334",
            "city" => "0|Bandar Lampung",
            "date" => "2024-07-19",
            "time" => "09:00 - Selesai",
            "project" => "Rumah aja",
            "type" => "Interior",
            "address" => "Bandar Lampung"
        ]);
        $response->assertStatus(302);
    }
}
