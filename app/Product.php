<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function images(){
    	return $this->morphMany(Image::class,'imageable');
    }
}
