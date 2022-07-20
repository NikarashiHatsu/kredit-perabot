<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subcategory extends Model
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();

        static::saving(function($model) {
            $model->slug = str()->slug($model->name);
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    protected $guarded = [
        'id',
        'category_id',
    ];

    protected $fillable = [
        'category_id',
        'slug',
        'name',
    ];
}
