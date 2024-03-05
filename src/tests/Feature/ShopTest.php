<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Shop;
use App\Models\Staff;

class ShopTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->seed('RolesTableSeeder');
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
        $this->user=User::factory()->create();
        $this->staff=Staff::create([
            'user_id'=>$this->user->id,
            'shop_id'=>$this->shop->id,
        ]);
        $response=$this->actingAs($this->shopManager)->get("/shop/management");
        $response->assertStatus(200);
        $response=$this->actingAs($this->shopManager)->get("/shop/staff_delete");
        $response->assertStatus(200);
        $this->actingAs($this->shopManager)->get(route('staffDelete',$this->staff->id));
        $this->assertDatabaseMissing('staffs',[
            'id'=>$this->staff->id
        ]);
        $emailUser=User::factory()->create();
        $emailUser->roles()->attach(3);
        $this->actingAs($this->shopManager)->get(route('sendInvite',$this->shop->id));
        $this->actingAs($emailUser)->post(route('postMailInvite',[$this->shop,$emailUser]));
        $this->assertDatabaseHas('staffs',[
            'user_id'=>$emailUser->id,
            'shop_id'=>$this->shop->id,
        ]);
    }
}
