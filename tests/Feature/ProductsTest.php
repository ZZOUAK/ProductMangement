<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductsTest extends TestCase
{
    use WithFaker,RefreshDatabase;
    /** @test */

    public function a_user_can_create_a_product()
    {
        $this->withoutExceptionHandling();

        $attributes = [
            'name' =>$this->faker->name,
            'description' =>$this->faker->paragraph,
            'price'=>$this->faker->randomFloat,
            'image'=>$this->faker->image('public/storage/images',400,300, null, false),
            'category'=>$this->faker->word
        ];

        $this->post('/products',$attributes)->assertRedirect('/');

        $this->assertDatabaseHas('products',$attributes);
        $this->get('/')->assertSee($attributes);


    }
}
