<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bill_detail extends Model
{
    protected $table = "bill_detail";

    public function products(){
    	return $this->belongsto('App\products','id_product','id');
    }

    public function bills(){
    	return $this->belongsto('App\bills','id_bill','id');
    }
}
