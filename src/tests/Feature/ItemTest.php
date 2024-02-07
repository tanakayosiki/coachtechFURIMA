<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Item;

class ItemTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        Item::create([
            'situation'=>'良好',
            'category'=>'ギター',
            'img'=>'ZAKU0ojONiMmnONlkAFqnJvdJKrI2KGsXbw3J5Bi.jpg',
            'name'=>'レスポール',
            'detail'=>'ほぼ新品です',
            'brand'=>'',
            'amount'=>'200000',
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
    }
}
