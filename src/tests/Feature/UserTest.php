<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $user=User::factory()->create();
        $this->assertDatabaseHas('users',[
            'id'=>$user->id
        ]);
        $response = $this->actingAs($user)->get('/login');
        $response->assertStatus(200);
        $response = $this->actingAs($user)->post('/login',[
            'email'=>$user->email,
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
        ]);
        $response->assertStatus(302);
        $this->assertAuthenticatedAs($user);
    }
}
