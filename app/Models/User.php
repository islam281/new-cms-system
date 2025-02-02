<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
       'username',
        'name',
        'email',
        'avatar',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function posts(){

        return $this->hasMany(Post::class);
        
    }


    public function Roles(){

        return $this->belongsToMany(Role::class);
            }
        
            public function permissions(){
        
                return $this->belongsToMany(Permission::class);
        
        
            }




            public function setPasswordAttribute($value){


                $this->attributes['password']=bcrypt($value);
            }



            public function getAvatarAttribute($value){

                return asset('storage/'. $value);
            }


            public function userHasRole($user_role){

                foreach($this->Roles as $role){

                    
                 if(Str::lower($user_role)==Str::lower($role->name) )

                    return true;
                 
                

                }
                return false;



            }


}
