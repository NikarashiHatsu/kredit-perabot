<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();

        static::saving(function($model) {
            $model->slug = str()->slug($model->name);

            if (request()->hasFile('picture_1')) {
                $model->picture_1 = request()->file('picture_1')->store('products');
            }

            if (request()->hasFile('picture_2')) {
                $model->picture_2 = request()->file('picture_2')->store('products');
            }

            if (request()->hasFile('picture_3')) {
                $model->picture_3 = request()->file('picture_3')->store('products');
            }

            if (request()->hasFile('picture_4')) {
                $model->picture_4 = request()->file('picture_4')->store('products');
            }

            if (request()->hasFile('picture_5')) {
                $model->picture_5 = request()->file('picture_5')->store('products');
            }
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function views(): HasMany
    {
        return $this->hasMany(View::class);
    }

    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    protected function picture1(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value != null ? Storage::url($value) : null,
        );
    }

    protected function picture2(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value != null ? Storage::url($value) : null,
        );
    }

    protected function picture3(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value != null ? Storage::url($value) : null,
        );
    }

    protected function picture4(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value != null ? Storage::url($value) : null,
        );
    }

    protected function picture5(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value != null ? Storage::url($value) : null,
        );
    }

    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'name',
        'picture_1',
        'picture_2',
        'picture_3',
        'picture_4',
        'picture_5',
        'condition',
        'description',
        'price',
        'stock',
        'weight',
        'length',
        'width',
        'height',
        'color',
    ];
}
