<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

               // 'user_id'=> \App\Models\User::factory(),

                'title'=>fake()->title(),
                'body'=>fake()->paragraph(),
                'post_image'=>fake()->imageUrl(900,300)






            //
        ];
    }


    public function getPostImageAttribute($value){

        return asset('storage'.$value);
    }
}
