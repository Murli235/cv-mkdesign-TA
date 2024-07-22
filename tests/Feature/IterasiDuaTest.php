<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IterasiDuaTest extends TestCase
{
    public function test_klien_melakukan_pricing(): void
    {
        $user = User::where('email','murliana235@gmail.com')-> first();
        $response = $this->actingAs($user)
        ->withSession(['_token' => 'bzz'])
        ->get('/pricing/estimasi-biaya');

        $response->assertStatus(200);
        $response->assertSeeText('ESTIMASI BIAYA DESIGN');

    }

    public function test_admin_melakukan_pricing(): void
    {
        $user = User::where('email','mkd.design@gmail.com')-> first();
        $response = $this->actingAs($user)
        ->withSession(['_token' => 'bzz'])
        ->get('/pricing/estimasi-biaya');

        $response->assertStatus(200);
        $response->assertSeeText('ESTIMASI BIAYA DESIGN');

    }

    public function test_klien_membuat_pesanan(): void
    {
        $user = User::where('email','murliana235@gmail.com')-> first();
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


    public function test_admin_membuat_pesanan(): void
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
    public function test_admin_mengelola_riwayat_pemesanan(): void
    {
        $user = User::where('email','mkd.design@gmail.com')-> first();
        $response = $this->actingAs($user)
        ->withSession(['_token' => 'bzz'])
        ->get('/pemesanan/1/edit');

        $response->assertStatus(200);
        $response->assertSeeText('Detail Pemesanan');

    }
}
