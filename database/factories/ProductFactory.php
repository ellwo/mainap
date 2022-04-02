<?php

namespace Database\Factories;

use App\Models\Bussinse;
use App\Models\Department;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name'=>"Pro".$this->faker->lastName,
            'colors'=> $this->colors(),
            'note'=>$this->notes(),
            'img'=>$this->faker->imageUrl(250,250,"shopping"),
            'price'=>rand(260,4890),
            'bussinse_id'=>Bussinse::inRandomOrder()->pluck('id')->first(),
            'user_id'=>User::inRandomOrder()->pluck('id')->first(),
            "department_id"=>Department::inRandomOrder()->pluck("id")->first()


        ];
    }


    public  function  notes(){
        $nott=[];

        for($i=0; $i<rand(2,5); $i++)
            $nott[$this->faker->text(20)]=$this->faker->text(50);

        return $nott;

    }

    public function  colors()
    {
        $colors=[];

        for($i=0; $i<rand(1,3); $i++){
            $colors[$this->faker->colorName()]=$this->faker->hexColor;
        }

        return  $colors;

    }
}
