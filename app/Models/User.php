<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    public const ROLE_ADMIN = 'admin';
    public const ROLE_SALESMAN = 'salesman';
    public const ROLE_CUSTOMER = 'customer';

    /** Roles that may enter the back-office. */
    public const STAFF_ROLES = [self::ROLE_ADMIN, self::ROLE_SALESMAN];

    /**
     * 'role' and 'is_active' are deliberately not mass assignable (privilege escalation risk).
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
    ];

    /**
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'last_login_at' => 'datetime',
            'is_active' => 'boolean',
            'password' => 'hashed',
        ];
    }

    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isSalesman(): bool
    {
        return $this->role === self::ROLE_SALESMAN;
    }

    public function isStaff(): bool
    {
        return in_array($this->role, self::STAFF_ROLES, true);
    }

    /** Where this user lands after login: back-office for staff, storefront for customers. */
    public function homePath(): string
    {
        return $this->isStaff() ? route('admin.dashboard') : route('home');
    }
}
