<?php

namespace App\Models;

use App\Http\Traits\CanConvristion;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Znck\Eloquent\Traits\BelongsToThrough;
use Nagy\LaravelRating\Traits\Rate\CanRate;
use Rennokki\Befriended\Traits\Block;
use Rennokki\Befriended\Contracts\Blocking;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements Blocking
{
    use HasApiTokens, HasFactory, Notifiable,CanRate,BelongsToThrough,
    CanConvristion,Block,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'phone',
        'gendar',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function blockers_user(){
        return $this->blockers(Bussinse::class)->get();
    }


    public function chatrooms()
    {
        # code...
        return   ChatRoom::with("messages")->
        where(function ($query) {
            $query->where("to_id",$this->id)
            ->Orwhere("from_id",$this->id);

        })
        ->where(function($query){
            $query->where("from_type",get_class($this))
            ->Orwhere("to_type",get_class($this));
        })
        ->orderByRelation("messages:id");

    }

    public function convristions(){



      //  return $this->hasMany(Convrstion::class,"from_id");
        return  Convrstion::
        with("messages")->
        where(function ($query) {
            $query->where("to_id",$this->id)
            ->Orwhere("from_id",$this->id);

        })
        ->where(function($query){
            $query->where("from_type",get_class($this))
            ->Orwhere("to_type",get_class($this));
        })
        ->orderByRelation("messages:id");
    }
    public function enable_convristions(){

        $fromConvris=$this->convristions();
        $toConvris=$this->morphMany(Convrstion::class,"to");


        return $fromConvris->merge($toConvris);

    }


    public function token($tokenName="graphql"){

        $token=$this->createToken("api");
       //$token=$this->tokens()->first();
        return $token->plainTextToken;
    }

    public function bussinses_followed(){
        return $this->belongsToMany(Bussinse::class)
        ->wherePivot("isblocked","=",0);
    }


    public function unfollow($buss_id)
    {

        $buss=$this->bussinses_followed()->where("id",$buss_id)->first();
       if($buss)
        return $buss->pivot->delete();
        else
        return false;



        # code...
    }

    public function follow($buss_id)
    {

        $buss=Bussinse::find($buss_id);
        if(!$buss->isBlocking($this)){


            return true;
        }
    else
        return false;

        # code...
    }


    public function bussinses()
    {


        # code...
        return $this->hasMany(Bussinse::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function country()
    {
        return $this->belongsToThrough(Country::class,[City::class]);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }

}
