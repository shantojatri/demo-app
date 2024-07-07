<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\UserRoleEnum;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $appends = ['IsSuperAdmin', 'IsAdmin', 'IsCustomer'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'role',
        'status',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
            // 'role'              =>  UserRoleEnum::class,
        ];
    }

    public function getIsSuperAdminAttribute() {
        return $this->role === UserRoleEnum::SUPER_ADMIN->value;
    }

    public function getIsAdminAttribute() {
        return $this->role === UserRoleEnum::ADMIN->value;
    }

    public function getIsCustomerAttribute() {
        return $this->role === UserRoleEnum::CUSTOMER->value;
    }
}
