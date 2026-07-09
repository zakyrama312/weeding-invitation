<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $fillable = ['name', 'slug', 'price', 'promo_price', 'preview_image', 'is_active'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
