<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'o93m3_countries';

    public function properties()
    {
        return $this->hasMany(Property::class, 'country', 'id');
    }
}
