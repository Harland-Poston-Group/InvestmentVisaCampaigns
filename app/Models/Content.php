<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $connection = 'hp_iv'; // Secondary DB
    protected $table = 'o93m3_content'; // Table for news & faqs
    public $timestamps = false; // If created_at/updated_at are missing

    protected $fillable = [
        'title', 'introtext', 'fulltext', 'catid', 'state', 'created', 'images'
        // Add other fields if needed
    ];

    // 🔍 Scope for news (catid = 22)
    public function scopeNews($query)
    {
        return $query->where('catid', 22)->where('state', 1);
    }

    // 🔍 Scope for FAQs (catid in 35,36,37,55-148)
    public function scopeFaqs($query)
    {
        return $query->where('state', 1)
            ->where(function ($q) {
                $q->whereIn('catid', [35, 36, 37])
                    ->orWhereBetween('catid', [55, 148]);
            });
    }
}
