<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	//create function to relashib with Product class .
    public function Products()
    {
    	return $this->hasMany('App\Product');
    }
}
