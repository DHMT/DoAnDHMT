<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = "products";

    public function product_type(){
    	return $this->belongsto('App\product_type','id_type','id');
    }
    public function bill_detail(){
    	return $this->hasmany('App\bill_detail','id_product','id');
    }
}
