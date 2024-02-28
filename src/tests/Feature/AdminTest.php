<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class AdminTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->seed('RolesTestTableSeeder');
        $adminUser=User::factory()->create();
        $adminUser->roles()->sync(1);
        $user=User::factory()->create();
        $user->roles()->sync(3);
        $this->actingAs($adminUser)->get(route('adminDelete',$user->id));
        $this->assertDatabaseMissing('users',[
            'id'=>$user->id
        ]);
    }
}
