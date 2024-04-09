<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

	protected $guarded = array();

	public function rents()
    {
        return $this->hasMany(Rent::class);
    }
}
