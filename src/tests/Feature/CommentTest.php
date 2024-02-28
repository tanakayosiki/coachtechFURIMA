<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Item;
use App\Models\Comment;
use App\Models\Sell;

class CommentTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->user=User::factory()->create();
        $this->item=Item::factory()->create();
        $comment=Comment::create([
            'user_id'=>$this->user->id,
            'item_id'=>$this->item->id,
            'comment'=>'あいうえお',
        ]);
        $this->assertDatabaseHas('comments',[
            'user_id'=>$this->user->id,
            'item_id'=>$this->item->id,
            'comment'=>'あいうえお',
        ]);
        $seller=Sell::create([
            'user_id'=>$this->user->id,
            'item_id'=>$comment->item->id,
        ]);
        $this->actingAs($seller->user)->get(route('deleteComment',$comment->id));
        $this->assertDatabaseMissing('comments',[
            'id'=>$comment->id
        ]);
    }
}
