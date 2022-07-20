<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();

        static::creating(function($model) {
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
