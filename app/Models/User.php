<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $model->password = Hash::make(request()->password);
        });

        static::saving(function($model) {
            if (request()->hasFile('picture')) {
                $model->picture = request()->file('picture')->store('users');
            }

            if (request()->hasFile('identity_card_picture')) {
                $model->identity_card_picture = request()->file('identity_card_picture')->store('users');
            }

            if (request()->hasFile('family_identity_card_picture')) {
                $model->family_identity_card_picture = request()->file('family_identity_card_picture')->store('users');
            }

            if (request()->hasFile('tax_identity_picture')) {
                $model->tax_identity_picture = request()->file('tax_identity_picture')->store('users');
            }

            if (request()->hasFile('salary_slip_picture')) {
                $model->salary_slip_picture = request()->file('salary_slip_picture')->store('users');
            }

            if (request()->password != null && password_verify(request()->password, $model->password)) {
                $model->password = Hash::make(request()->password);
            }
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'picture',
        'role',
        'place_of_birth',
        'date_of_birth',
        'marriage_status',
        'address',
        'identity_card_picture',
        'family_identity_card_picture',
        'tax_identity_picture',
        'salary_slip_picture',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function picture(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value != null ? Storage::url($value) : null,
        );
    }

    protected function identityCardPicture(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value != null ? Storage::url($value) : null,
        );
    }

    protected function familyIdentityCardPicture(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value != null ? Storage::url($value) : null,
        );
    }

    protected function taxIdentityPicture(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value != null ? Storage::url($value) : null,
        );
    }

    protected function salarySlipPicture(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value != null ? Storage::url($value) : null,
        );
    }

    public function scopeCreditor($query)
    {
        return $query->where('role', 'user');
    }

    public function scopeAdmin($query)
    {
        return $query->where('role', 'admin');
    }
}
