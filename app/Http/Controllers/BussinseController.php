<?php

namespace App\Http\Controllers;

use App\Models\Bussinse;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class BussinseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response(['ss'=>'yes'],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bussinse  $bussinse
     * @return \Illuminate\Http\Response
     */



     public function follow_bussinse(Request $request)
     {

        if($request->has("buss_id")){
            $user=User::find(auth()->user()->id);

            $bussinse=Bussinse::find($request["buss_id"]);

            if($user!=null){



             if($request["typef"]=="follow"){
           if($user->follow($bussinse))
            return $data=[
                "status"=>true,
                'message'=>'تم المتابعة'
            ];
            else{

            return $data=[
                "status"=>false,
                'message'=>'فشل'
            ];
            }

        }

        else{

            if($user->unfollow($bussinse))
            return $data=[
                "status"=>true,
                'message'=>'تم الغاء المتابعة'
            ];
            else{

            return $data=[
                "status"=>false,
                'message'=>'فشل'
            ];
            }



        }




        }
        else{
            return $data=[
                "status"=>false,
                'message'=>'un auth فشل'
            ];
        }

        }
        else{
            return $data=[
                "status"=>false,
                'message'=>'فشل b is not set'
            ];
        }


         # code...
     }


    public function show($username)
    {

       // $b=Bussinse::where("username","=",$username)->first();

     //   $b->products()->saveMany(Product::whereDoesntHave('owner')->inRandomOrder()->take(rand(1,4))->get());

       echo Product::where("owner_type","=",null)->where("owner_id","=",null)->get();
    return;
  //      return dd($b->products()->count());
        //
      //  $bussinse=Bussinse::find(request('id'));



    //   dd($b->withAvg("products:ratings:value")->get());
    //   return;
    //   $sum=0;
    //   $count=0;
    //   foreach($b->products()->withAvg("ratings:value")->get() as $prod){
    //     $sum+=$prod->ratings_value_avg;
    //     $count++;
    //   }


    //   if($count!=0)
    //     return (int)$sum/$count;
    //     else
    //     return 0;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bussinse  $bussinse
     * @return \Illuminate\Http\Response
     */
    public function edit(Bussinse $bussinse)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bussinse  $bussinse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bussinse $bussinse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bussinse  $bussinse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bussinse $bussinse)
    {
        //
    }
}
