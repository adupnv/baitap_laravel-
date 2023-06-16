<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $table ="products";

    public function type_product(){
        return $this ->belongsTo('App\type_products');
    }

    public function bill_detail(){
        return $this ->hasMany('App\bill_detail');
    }

    public function comment(){
        return $this ->hasMany('App\comments');
    }
}
