<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0 ;
    const STATUS_REMOVED = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status'
    ];

    public static function boot()
    {
        parent::boot();

        static::created(function (User $user) {
            $user->createToken($user->getAttribute('name'));
        });
    }

    public function getStatus(){
        switch ($this->status){
            case self::STATUS_ACTIVE :return 'Ативный';break;
            case self::STATUS_INACTIVE : return 'Неактивный';break;
            case self::STATUS_REMOVED: return 'Удален';break;
            default : return null;
        }
    }

    public static function getStatusesDropdown(){
        return [
            self::STATUS_ACTIVE => 'Ативный',
            self::STATUS_INACTIVE => 'Неактивный',
            self::STATUS_REMOVED => 'Удален'
        ];
    }

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
