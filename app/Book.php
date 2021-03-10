<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'name', 'category', 'author', 
    ];

    public function readData() {  
        return $this->hasMany(UserBook::class, 'book_id','id');   
    }
}
