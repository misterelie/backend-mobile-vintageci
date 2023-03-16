<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

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

    protected $dates = [
    "created_at",
    "updated_at",
    ];


    public function annonces(){
        return $this->hasMany(Annonce::class, 'user_id')->where("retire", false);
    }

    public function reset()
    {
        return $this->hasOne(PasswordReset:: class, "email");
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'user_id');
        //return $this->morphMany(Notification::class, "notifiable", "notifiable_type", "notifiable_id", "id");
    }

    public function logs()
    {
        return $this->hasMany(UserLog::class, "user_id");
    }

    public function purchases()
    {
        return $this->hasMany(PurchaseCredit::class, 'user_id');
    }

    public function solde()
    {
        return $this->hasOne(UserSolde::class, 'user_id');
    }

    public function payementsList(){
        return $this->hasOne(VipPurchaseList::class, 'user_id');
    }

    
    
}
