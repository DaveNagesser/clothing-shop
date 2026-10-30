<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_products', 'products_id', 'users_id');
    }

    protected $fillable = [
        'name',
        'description',
        'price',
        'brand',
        'category_id',
        'image',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id');
    }
}
