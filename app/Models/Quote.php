<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;
    protected $fillable = [
        'quote',
        'author',
        'category'
    ];

    /**
     * Get the category that owns the quote
     */
    public function categoryModel()
    {
        return $this->belongsTo(Category::class, 'category', 'name');
    }

    /**
     * Scope a query to only include quotes of a given category
     */
    public function scopeOfCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    /**
     * Get a random quote
     */
    public static function random()
    {
        return static::inRandomOrder()->first();
    }
}
