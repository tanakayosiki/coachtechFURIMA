<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Item;

class NiceTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $user=User::factory()->create();
        $item=Item::factory()->create();
        $this->actingAs($user)->get(route('nice',$item));
        $this->assertDatabaseHas('nices',[
            'user_id'=>$user->id,
            'item_id'=>$item->id,
        ]);
        $this->actingAs($user)->get(route('unnice',$item->id));
        $this->assertDatabaseMissing('nices',[
            'user_id'=>$user->id,
            'item_id'=>$item->id,
        ]);
    }
}
