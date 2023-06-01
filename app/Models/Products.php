<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table= "products";
    public function type_products(){
        return $this->belongTo('App/Type_products');
    }
    public function bill_detail(){
        return $this->hasMany('App/Bill_detail');
    }
    public function comments(){
        return $this->hasMany('App/Comments');
    }
    public function wishlists(){
        return $this->hasMany('App/Wishlists');
    }
}
