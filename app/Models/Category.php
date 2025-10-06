<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'type'
    ];

    /**
     * Get quotes for this category
     */
    public function quotes()
    {
        return $this->hasMany(Quote::class, 'category', 'name');
    }
}
