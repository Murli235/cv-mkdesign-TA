<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IterasiSatuTest extends TestCase
{
    use WithFaker;
    public function test_admin_login(): void
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

    public function test_klien_login(): void
    {
        $user = User::where('email','murliana235@gmail.com')-> first();
        $response = $this->withSession(['_token' => 'bzz'])
        ->postJson('/login', [
            '_token' => 'bzz',
            'email' => 'murliana235@gmail.com',
            'password' => 'murliana',
        ]);

        $this->assertAuthenticatedAs($user);
    }

    public function test_owner_login(): void
    {
        $user = User::where('email','owner@gmail.com')-> first();
        $response = $this->withSession(['_token' => 'bzz'])
        ->postJson('/login', [
            '_token' => 'bzz',
            'email' => 'owner@gmail.com',
            'password' => '12345678',
        ]);

        $this->assertAuthenticatedAs($user);
    }

    public function test_menampilkan_halaman_beranda(): void
    {
        $user = User::where('email','murliana235@gmail.com')-> first();
        $response = $this->actingAs($user)
        ->withSession(['_token' => 'bzz'])
        ->get('/');

        $response->assertStatus(200);
        $response->assertSeeText('CV. MEGA KREASI DESIGN');

    }

    public function test_menampilkan_halaman_our_project(): void
    {
        $user = User::where('email','murliana235@gmail.com')-> first();
        $response = $this->actingAs($user)
        ->withSession(['_token' => 'bzz'])
        ->get('/our-project');

        $response->assertStatus(200);
        $response->assertSeeText('OUR PROJECT');

    }
    public function test_menampilkan_halaman_about_us(): void
    {
        $user = User::where('email','murliana235@gmail.com')-> first();
        $response = $this->actingAs($user)
        ->withSession(['_token' => 'bzz'])
        ->get('/about');

        $response->assertStatus(200);
        $response->assertSeeText('About Us');

    }
    public function test_admin_menambahkan_project(): void
    {
        $user = User::where('email','mkd.design@gmail.com')-> first();
        $response = $this->actingAs($user)
        ->withSession(['_token' => 'bzz'])
        ->postJson(route('project.store'), [
            '_token' => 'bzz',
            'name' => $this->faker->name(),
            'theme' => $this->faker->name(),
            'category' => $this->faker->name(),
            'description' => 'absdhihdhdadnk sjdiaydihasd'
        ]);

        $response->assertStatus(302);
    }
    public function test_admin_mengedit_about_us(): void
    {
        $user = User::where('email','mkd.design@gmail.com')-> first();
        $response = $this->actingAs($user)
        ->withSession(['_token' => 'bzz'])
        ->putJson(route('about-us.update', 1), [
            '_token' => 'bzz',
            'email' => 'cvmkddesign@gmail.com',
            'phone' => '085789102976',
            'instagram' => 'mkd.design',
            'maps' => 'mkd design, Bandar Lampung',
            'description' => 'ini adalah deskripsi'
        ]);

        $response->assertStatus(302);
    }
}
