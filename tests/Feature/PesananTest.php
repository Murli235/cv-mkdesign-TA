<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PesananTest extends TestCase
{

    public function test_view_pesanan(): void
    {
        $user = User::where('email','mkd.design@gmail.com')-> first();
        $response = $this->actingAs($user)
        ->withSession(['_token' => 'bzz'])
        ->get('/pemesanan');

        $response->assertStatus(200);
        $response->assertSeeText('Pemesanan');

    }
    public function test_create_pesanan(): void
    {
        $user = User::where('email','mkd.design@gmail.com')-> first();
        $response = $this->actingAs($user)
        ->withSession(['_token' => 'bzz'])
        ->postJson(route('pemesanan.store'), [
            '_token' => 'bzz',
            "name" => "ana",
            "email" => "ana@gmail.com",
            "phone" => "098765432111",
            "project" => "Rumah sendiri",
            "jumlah_tingkat" => "2",
            "luas_bangunan" => "20",
            "type" => "Paket B",
            "cost" => null
        ]);
        $response->assertStatus(302);
    }
}
