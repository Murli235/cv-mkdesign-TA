<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AboutUsTest extends TestCase
{
    public function test_edit_about_us(): void
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
