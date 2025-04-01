<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $connection = 'hp_iv';  // Use the secondary DB
    protected $table = 'o93m3_ph_properties';  // Confirm your table name

    // If you don’t have timestamps (created_at/updated_at), add this:
    public $timestamps = false;

    // Add fillable fields if you're mass assigning
    protected $fillable = [
        'title','slug', 'location', 'price', 'type', 'summary', 'description' // etc.
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function countryRelation()
    {
        return $this->belongsTo(Country::class, 'country', 'id');
    }


}
