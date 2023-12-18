<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\InvoiceItem;

class Invoice extends Model
{
    use HasFactory;

    protected $hidden = ['created_at','updated_at'];

    public function items(){
        return $this->hasMany(InvoiceItem::class);
    }
}
