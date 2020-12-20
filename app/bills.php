<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bills extends Model
{
    protected $table = "bills";

    public function bill_detail(){
    	return $this->hasmany('App\bill_detail','id_bill','id');
    }

    public function customer(){
    	return $this->belongsto('App\custopmer','id_customer','id');
    }
}
