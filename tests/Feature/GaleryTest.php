<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class GaleryTest extends TestCase
{
    use WithFaker;
    public function test_view_galery(): void
    {
        $user = User::where('email','mkd.design@gmail.com')-> first();
        $response = $this->actingAs($user)
        ->withSession(['_token' => 'bzz'])
        ->get('/galery');

        $response->assertStatus(200);
        $response->assertSeeText('Galery');

    }
    public function test_input_galery(): void
    {
        Storage:fake('local');
        $file=UploadedFile::fake()->image('random.jpg');

        $user = User::where('email','mkd.design@gmail.com')-> first();
        $response = $this->actingAs($user)
        ->withSession(['_token' => 'bzz'])
        ->postJson(route('galery.store'), [
            '_token' => 'bzz',
            'projectId' => '1',
            'filepond' => [$file]
        ]);

        $response->assertStatus(302);
    }
}
