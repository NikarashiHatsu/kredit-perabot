<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    public function subcategories(): HasMany
    {
        return $this->hasMany(Subcategory::class);
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function($model) {
            $model->slug = str()->slug($model->name);
        });
    }

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'name',
    ];
}
