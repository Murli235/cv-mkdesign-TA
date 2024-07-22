<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use WithFaker;
    public function test_view_project(): void
    {
        $user = User::where('email','mkd.design@gmail.com')-> first();
        $response = $this->actingAs($user)
        ->withSession(['_token' => 'bzz'])
        ->get('/project');

        $response->assertStatus(200);
        $response->assertSeeText('Project');

    }
    public function test_create_project(): void
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
    // public function test_delete_project(): void
    // {
    //     $user = User::where('email','mkd.design@gmail.com')-> first();
    //     $response = $this->actingAs($user)
    //     ->withSession(['_token' => 'bzz'])
    //     ->deleteJson('/project', [
    //         '_token' => 'bzz'
    //     ]);

    //     $response->assertStatus(302);
    // }
}
