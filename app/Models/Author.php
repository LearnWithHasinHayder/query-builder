<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    //relation with books
    public function books() {
        // return $this->belongsToMany('App\Models\Book');
        return $this->belongsToMany(Book::class);
    }
}
