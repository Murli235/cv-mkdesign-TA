<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IterasiTigaTest extends TestCase
{
    public function test_menampilkan_halaman_pengajuan_survei_klien(): void
    {
        $user = User::where('email','murliana235@gmail.com')-> first();
        $response = $this->actingAs($user)
        ->withSession(['_token' => 'bzz'])
        ->get('/survei');

        $response->assertStatus(200);
        $response->assertSeeText('Survei');

    }

    public function test_klien_membuat_pengajuan_survei(): void
    {
        $user = User::where('email','murliana235@gmail.com')-> first();
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

    public function test_invoice_survei_klien(): void
    {
        $user = User::where('email','murliana235@gmail.com')-> first();
        $response = $this->actingAs($user)
        ->withSession(['_token' => 'bzz'])
        ->get('/pricing/survei/detail/1');

        $response->assertStatus(200);
        $response->assertSeeText('Diterbitkan Oleh');

    }

    public function test_admin_membuat_pengajuan_survei(): void
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

    public function test_admin_mengubah_detail_pengajuan_survei(): void
    {
        $user = User::where('email','mkd.design@gmail.com')-> first();
        $response = $this->actingAs($user)
        ->withSession(['_token' => 'bzz'])
        ->get('/survei/1/edit');

        $response->assertStatus(200);
        $response->assertSeeText('Detail Survei');

    }
    public function test_menampilkan_history_pengajuan_survei_owner(): void
    {
        $user = User::where('email','murliana235@gmail.com')-> first();
        $response = $this->actingAs($user)
        ->withSession(['_token' => 'bzz'])
        ->get(route('survei.store'));

        $response->assertStatus(200);
        $response->assertSeeText('Survei');

    }
}
