<?php

namespace Database\Seeders;

use App\Models\Bussinse;
use App\Models\City;
use App\Models\Country;
use App\Models\Part;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Country::factory(5)->create();
        \App\Models\City::factory(10)->create();
        \App\Models\User::factory(10)->create();
        \App\Models\Department::factory(10)->create();
        \App\Models\Part::factory(20)->create();
        \App\Models\Bussinse::factory(20)->create();
        \App\Models\Product::factory(50)->create();
        \App\Models\Service::factory(50)->create();
        \App\Models\Part::factory(80)->create();

        $bussinses=Bussinse::all();
        foreach ($bussinses as $bussnise){
            $contr=Country::inRandomOrder()->first();
            $cities=$contr->cities->take(rand(1,4))->pluck("id");

            $bussnise->cities()->attach($cities);


            $parts=$bussnise->department->parts()->inRandomOrder()->take(rand(2,6))->pluck('id');
            $bussnise->parts()->attach($parts);

            foreach($bussnise->products as $pro){

                $pro->parts()->attach($bussnise->parts()->inRandomOrder()->take(rand(1,3))->pluck('id'));
                $pro->cities()->attach($bussnise->cities()->inRandomOrder()->take(rand(1,3))->pluck('id'));



            }


            foreach($bussnise->services as $pro){

                $pro->parts()->attach($bussnise->parts()->inRandomOrder()->take(rand(1,3))->pluck('id'));
                $pro->cities()->attach($bussnise->cities()->inRandomOrder()->take(rand(1,3))->pluck('id'));
            }


            $bussnise->followers()->attach(User::inRandomOrder()->take(rand(1,4))->pluck("id"));
        }

        $user=User::create(
            [
                'name'=>'admin',
                "email"=>"admin@me.com",
                "password"=>Hash::make("admin"),
                "gender"=>1,
                "city_id"=>2,
                "username"=>"mo",
                "phone"=>"775212843"
            ]
        );

        Role::create([
            'name'=>'admin'
        ]);

        Role::create([
            'name'=>'normal'
        ]);




        $users=User::all();

        foreach ($users as $user){


            $products=Product::all();

            foreach ($products as $product){

               // $user->sync
                $user->rate($product,rand(1,5));



            }
            $user->bussinses_followed()->attach(Bussinse::inRandomOrder()->take(5)->pluck("id"));




        }






    }
}
