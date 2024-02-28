<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Item;
use App\Models\User;
use App\Models\Sell;

class ItemTest extends TestCase
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
        $item=Item::create([
            'situation'=>'良好',
            'category'=>'ギター',
            'img'=>'ZAKU0ojONiMmnONlkAFqnJvdJKrI2KGsXbw3J5Bi.jpg',
            'name'=>'レスポール',
            'detail'=>'ほぼ新品です',
            'brand'=>'',
            'amount'=>'200000'
        ]);
        $this->assertDatabaseHas('items',[
            'situation'=>'良好',
            'category'=>'ギター',
            'img'=>'ZAKU0ojONiMmnONlkAFqnJvdJKrI2KGsXbw3J5Bi.jpg',
            'name'=>'レスポール',
            'detail'=>'ほぼ新品です',
            'brand'=>'',
            'amount'=>'200000',
        ]);
        Sell::create([
            'user_id'=>$user->id,
            'item_id'=>$item->id,
        ]);
        $this->assertDatabaseHas('sells',[
            'user_id'=>$user->id,
            'item_id'=>$item->id,
        ]);
    }
}
