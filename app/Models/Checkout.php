<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;

class Checkout extends Model
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $model->user_id = auth()->id();
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    protected function paymentReceipt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value != null ? Storage::url($value) : null,
        );
    }

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'price',
        'duration',
        'subtotal',
        'installment',
        'interest_rate',
        'service_rate',
        'payment_receipt',
        'is_read',
    ];
}
