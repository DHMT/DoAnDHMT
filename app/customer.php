<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $table = "customer";

    public function bills(){
    	return $this->hasmany('App\bills','id_customer','id');
    }
}
