<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Donation;
use App\Models\Volunteer;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;


    public function volunteer()
    {
        return $this->hasOne(Volunteer::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }



    public function scopeFilter($query, array $filters)
    {
        if ($filters["role"] ?? false) {
            if ($filters["role"] == "all") {
                $query->get("*");
            } else {
                $query->where("role", "=", $filters);
            }
        }

        if ($filters["search"] ?? false) {
            $query->where("name", "LIKE", "%" . $filters["search"] . "%")->first();
        }
    }



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
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
}
