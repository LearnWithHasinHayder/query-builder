<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;
class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    //relation with author
    public function authors() {
        // return $this->belongsToMany('App\Models\Author');
        return $this->belongsToMany(Author::class);
    }
}
