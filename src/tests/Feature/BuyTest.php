<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Item;
use App\Models\Profile;
use App\Models\Buy;

class BuyTest extends TestCase
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
        $item=Item::factory()->create();
        $name="name";
        $img="img";
        $profile=Profile::create([
            'user_id'=>$user->id,
            'name'=>$name,
            'img'=>$img,
            'address'=>'東京都',
            'post_code'=>'000-0000',
            'building'=>'aaa',
        ]);
        $this->assertDatabaseHas('profiles',[
            'user_id'=>$user->id,
            'name'=>$name,
            'img'=>$img,
            'address'=>'東京都',
            'post_code'=>'000-0000',
            'building'=>'aaa',
        ]);
        Buy::create([
            'user_id'=>$user->id,
            'item_id'=>$item->id,
            'profile_id'=>$profile->id,
            'payment'=>'10000',
        ]);
        $this->assertDatabaseHas('buys',[
            'user_id'=>$user->id,
            'item_id'=>$item->id,
            'profile_id'=>$profile->id,
            'payment'=>'10000',
        ]);
    }
}
