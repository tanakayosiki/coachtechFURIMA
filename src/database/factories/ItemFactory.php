<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'situation'=>'良好',
            'category'=>'ギター',
            'img'=>'ZAKU0ojONiMmnONlkAFqnJvdJKrI2KGsXbw3J5Bi.jpg',
            'name'=>'レスポール',
            'detail'=>'ほぼ新品です',
            'brand'=>'',
            'amount'=>'200000',
        ];
    }
}
