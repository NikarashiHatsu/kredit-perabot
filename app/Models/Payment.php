<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Payment extends Model
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $model->invoice = request()->file('invoice')->storePublicly('invoices');
            $model->status = "Pending";
            $model->is_read = false;
        });
    }

    public function checkout(): BelongsTo
    {
        return $this->belongsTo(Checkout::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    protected function invoice(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value != null ? Storage::url($value) : null,
        );
    }

    protected $fillable = [
        'checkout_id',
        'product_id',
        'status',
        'payment_order',
        'invoice',
        'is_read',
        'created_at',
    ];
}
