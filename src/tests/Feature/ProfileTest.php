<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Profile;
use App\Models\User;

class ProfileTest extends TestCase
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
        $profile=Profile::create([
            'user_id'=>$user->id,
            'name'=>'aaaaa',
            'img'=>'ZAKU0ojONiMmnONlkAFqnJvdJKrI2KGsXbw3J5B.jpg',
            'address'=>'東京',
            'post_code'=>'000-0000',
            'building'=>'aaa',
        ]);
        $this->assertDatabaseHas('profiles',[
            'user_id'=>$user->id,
            'name'=>'aaaaa',
            'img'=>'ZAKU0ojONiMmnONlkAFqnJvdJKrI2KGsXbw3J5B.jpg',
            'address'=>'東京',
            'post_code'=>'000-0000',
            'building'=>'aaa',
        ]);
    }
}
