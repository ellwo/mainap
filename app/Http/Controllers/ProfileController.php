<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user=auth()->user();
        return view("profile.index",compact("user"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("profile.edit-profile");
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return "show";
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //

        return "edit";


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //



        //return $request->bio;

        $user=auth()->user();

        $request->username=Str::of($request->username)->trim()->lower()->replace(" ","")->__toString();

      //  return $request["username"];

       // $username=$request["username"];

        //return $user;
        if($user->email != $request["email"]){
        $this->validate($request,[
            'name' => 'required',
            'email' => ['email', 'max:191', 'unique:users'],
        ]);
    }
        else if($request["username"]!=$user->username)
     {

        // regex:/^\S*$/u
        $this->validate($request,[
            'name' => 'required',
            'username' => ['min:4','regex:/^[a-z\d_.]{2,20}$/i','required','string', 'max:191', 'unique:users','unique:bussinses'],
        ]);
    }



    $user=User::find($user->id);

    $user->name=$request->name;
    $user->username=$request->username;
    $user->email=$request->email;
    $user->bio=$request->bio;
    $user->phone=$request->phone;

    $user->save();


        return redirect()->route("profile")->with("status","تم بنجاح");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
