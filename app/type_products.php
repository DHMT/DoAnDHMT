<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class type_products extends Model
{
    protected $table = "type_products";
    public function product(){
    	return $this->hasmany('App\product','id_type','id');
    }
}
