<?php

namespace App\Http\Livewire\Show;

use App\Models\Product;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsServeces extends Component
{

    use WithPagination;
    public $proORserv='pro';

    public $username;


    public function mount($username,$proORserv="pro"){
        $this->username=$username;
        $this->proORserv=$proORserv;
    }

    public function render()
    {

        $user=User::where("username","=",$this->username)->first();
        if($user!=null){


            if($this->proORserv=="pro")
            {

                $products=$user->products()->paginate(1);

        return view('livewire.show.products-serveces',compact('products'));
            }

            else
            {
                $products=$user->services()->paginate(1);

                return view('livewire.show.products-serveces',compact('products'));

            }



        }

        // $products=

        return view('livewire.show.products-serveces');
    }


}
