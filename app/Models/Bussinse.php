<?php

namespace App\Models;

use Alexmg86\LaravelSubQuery\Traits\LaravelSubQueryTrait;
use App\Http\Traits\CanConvristion;
use App\Http\Traits\Reportable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nagy\LaravelRating\Traits\Rate\Rateable;
use Nagy\LaravelRating\Traits\Like\Likeable;
use Staudenmeir\EloquentHasManyDeep\HasManyDeep;
use Rennokki\Befriended\Traits\Block;
use Rennokki\Befriended\Scopes\BlockFilterable;
use Rennokki\Befriended\Contracts\Blocking;
class Bussinse extends Model implements Blocking
{
    use HasFactory,Rateable,
        LaravelSubQueryTrait,
        \Znck\Eloquent\Traits\BelongsToThrough,
        \Staudenmeir\EloquentHasManyDeep\HasRelationships,
        CanConvristion,Block,BlockFilterable,Reportable;
    protected $fillable=[
        "name",
        "username",
        "avatar",
        "note",
        "imgs",
        "phone_numbers",
        "contact_links",
        "department_id",
        "user_id",
        "address"
    ];

    protected $casts=[
      'address'=>"array",
      "contact_links"=>"array",
      "imgs"=>"array",
      "phone_numbers"=>"array"
    ];






    public function chroms()
    {
        //return $this->morphToMany(ChatRoom::class,"to")->;
        # code...
    }

    public function convristions(){



        return $this->morphMany(Convrstion::class,"to")
        ->with("messages")->where("isblocked",0)->orderByRelation("messages:id");


        return Convrstion::with("messages")->
        where(function ($query) {
            $query->where("to_id",$this->id)
            ->Orwhere("from_id",$this->id);

        })
        ->where(function($query){
            $query->where("from_type",get_class($this))
            ->Orwhere("to_type",get_class($this));
        })
        ->where("isblocked",0)
        ->orderByRelation("messages:id")
        ->get();
    }


    public function enable_convristions(){

        $fromConvris=$this->convristions()->get();
        $toConvris=$this->morphMany(Convrstion::class,"to")->get();


        $enacle_conv=$toConvris->merge($fromConvris);
        return $enacle_conv->where("isblocked","=",0);

    }

    public function address_json(){
        return json_encode($this->address);
    }
    public function phone_numbers_json(){
        return json_encode($this->phone_numbers);
    }





    public function followers(){

        return $this->belongsToMany(User::class)
        ->wherePivot("isblocked","=",0);
     //   return $this->hasMany(Follower::class);
    }






    // public function blocked_followers()
    // {
    //     return $this->belongsToMany(User::class)
    //     ->wherePivot("isblocked","=",1);
    //     # code...
    // }




// public function block_user($user_id)
// {
//     $follower=$this->followers()->wherePivot("user_id","=",$user_id)->first();
//     $follower->pivot->isblocked=1;
//     $follower->pivot->save();

//     return true;
//     # code...
// }






    public function country()
    {



       // return ;
        return Country::find($this->cities()->find(7)->pluck("country_id")->first());
        //$this->belongsTo(Country::class);
         //HasManyDeep('App\Permission', ['role_user', 'App\Role']);
    }






    public function user()
    {
        # code...
        return $this->belongsTo(User::class);
    }





    public function department()
    {
        # code...
        return $this->belongsTo(Department::class);
    }



    public function cities()
    {
        # code...
        return $this->belongsToMany(City::class);
    }







    public function parts()
    {
        # code...
        return $this->belongsToMany(Part::class);
    }








    public function products()
    {
        return $this->hasMany(Product::class);
    }







    public function services()
    {
        return $this->hasMany(Service::class);
        # code...
    }



}
