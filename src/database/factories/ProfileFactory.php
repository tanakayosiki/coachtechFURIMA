<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user=User::factory()->create();
        return [
            'user_id'=>$user->id,
            'name'=>'aaaaa',
            'img'=>'ZAKU0ojONiMmnONlkAFqnJvdJKrI2KGsXbw3J5B.jpg',
            'address'=>'東京都',
            'post_code'=>'000-0000',
            'building'=>'aaa',
        ];
    }
}
