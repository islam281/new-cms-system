<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'post_image',
        'body'
    ];

    public function user(){

        return $this->belongsTo(User::class);
    }
        
    public function getPostImageAttribute($value){
        
        if(strpos($value,'placeholder')){

            return $value;

        }else{

        return asset('storage/'.$value);

        }
    }
}
