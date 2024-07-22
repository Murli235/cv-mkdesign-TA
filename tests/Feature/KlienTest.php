<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KlienTest extends TestCase
{
    public function test_view_home(): void
    {
        $user = User::where('email','murliana235@gmail.com')-> first();
        $response = $this->actingAs($user)
        ->withSession(['_token' => 'bzz'])
        ->get('/');

        $response->assertStatus(200);
        $response->assertSeeText('CV. MEGA KREASI DESIGN');

    }
    public function test_view_our_project(): void
    {
        $user = User::where('email','murliana235@gmail.com')-> first();
        $response = $this->actingAs($user)
        ->withSession(['_token' => 'bzz'])
        ->get('/our-project');

        $response->assertStatus(200);
        $response->assertSeeText('OUR PROJECT');

    }
    public function test_view_pemesanan(): void
    {
        $user = User::where('email','murliana235@gmail.com')-> first();
        $response = $this->actingAs($user)
        ->withSession(['_token' => 'bzz'])
        ->get('/pricing/pemesanan?_token=ZmSnUKSQfGN2nYMib0YivN28aWKw7PmTwMFYLxkS&jumlah_tingkat=&luas_bangunan=&paketType=Paket+A&cost=0');

        $response->assertStatus(200);
        $response->assertSeeText('Form Pemesanan');

    }
    public function test_form_pemesanan(): void
    {
        $user = User::where('email','murliana235@gmail.com')-> first();
        $response = $this->actingAs($user)

        ->get('/pricing/pemesanan/detail/1');

        $response->assertStatus(200);
        $response->assertSeeText('Diterbitkan Oleh');

    }
    public function test_view_permintaan_survei(): void
    {
        $user = User::where('email','murliana235@gmail.com')-> first();
        $response = $this->actingAs($user)
        ->withSession(['_token' => 'bzz'])
        ->get('/pricing/survei');

        $response->assertStatus(200);
        $response->assertSeeText('Form Permintaan Survei');

    }
    public function test_form_permintaan_survei(): void
    {
        $user = User::where('email','murliana235@gmail.com')-> first();
        $response = $this->actingAs($user)
        ->get('/pricing/survei/detail/1');

        $response->assertStatus(200);
        $response->assertSeeText('Diterbitkan Oleh');

    }
    public function test_view_about_us(): void
    {
        $user = User::where('email','murliana235@gmail.com')-> first();
        $response = $this->actingAs($user)
        ->withSession(['_token' => 'bzz'])
        ->get('/about');

        $response->assertStatus(200);
        $response->assertSeeText('About Us');

    }
    }
