<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Shop;
use App\Models\Staff;
use App\Models\ShopSell;
use App\Models\Item;
use App\Models\ShopComment;
use App\Models\Room;

class ShopCommentTest extends TestCase
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
        $this->shopManager=User::factory()->create();
        $this->assertDatabaseHas('users',[
            'email'=>$this->shopManager->email,
            'password'=>$this->shopManager->password
        ]);
        $this->shopManager->roles()->sync(3);
        $this->shop=Shop::factory()->create();
        $this->assertDatabaseHas('shops',[
            'img'=> 'ZAKU0ojONiMmnONlkAFqnJvdJKrI2KGsXbw3J5B.jpg',
            'name'=>'ローソン',
            'detail'=>'ショップ',
        ]);
        $this->shopManager->roles()->sync(2);
        Staff::create([
            'user_id'=>$this->shopManager->id,
            'shop_id'=>$this->shop->id,
        ]);
        $this->assertDatabaseHas('staffs',[
            'user_id'=>$this->shopManager->id,
            'shop_id'=>$this->shop->id,
        ]);
        $this->item=Item::create([
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
        ShopSell::create([
            'item_id'=>$this->item->id,
            'shop_id'=>$this->shop->id
        ]);
        $this->assertDatabaseHas('shop_sells',[
            'item_id'=>$this->item->id,
            'shop_id'=>$this->shop->id
        ]);
        $this->user=User::factory()->create();
        $this->nowRoom=Room::where('user_id',$this->user->id)->where('item_id',$this->item)->first();
        $null=null;
        if($this->nowRoom===$null){
        $this->room=Room::create([
            'user_id'=>$this->user->id,
            'item_id'=>$this->item->id,
            'shop_id'=>$this->shop->id,
        ]);
        $comment=ShopComment::create([
            'room_id'=>$this->room->id,
            'user_id'=>$this->user->id,
            'comment'=>'あいうえお',
        ]);
        }else{
            $comment=ShopComment::create([
            'room_id'=>$this->nowRoom->id,
            'user_id'=>$this->user->id,
            'comment'=>'あいうえお',
        ]);
        }
        $this->assertDatabaseHas('rooms',[
            'user_id'=>$this->user->id,
            'item_id'=>$this->item->id,
            'shop_id'=>$this->shop->id,
        ]);
        $this->assertDatabaseHas('shop_comments',[
            'room_id'=>$this->room->id,
            'user_id'=>$this->user->id,
            'comment'=>'あいうえお',
        ]);
        ShopComment::create([
            'room_id'=>$this->room->id,
            'comment'=>'かきくけこ',
            'user_id'=>$this->shopManager->id,
        ]);
        $this->assertDatabaseHas('shop_comments',[
            'room_id'=>$this->room->id,
            'comment'=>'かきくけこ',
            'user_id'=>$this->shopManager->id,
        ]);
        $this->actingAs($this->shopManager)->get(route('deleteShopComment',$comment->id));
        $this->assertDatabaseMissing('shop_comments',[
            'id'=>$comment->id
        ]);
    }
}
