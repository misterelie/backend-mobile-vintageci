<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PasswordReset extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];
    protected $table= "password_resets";

    protected $dates = [
    "created_at",
    "updated_at",
    ];

    public static function boot(){
        parent::boot();
        static::creating( function ($model){
            $model->created_at = \Carbon\Carbon::now(); //$model->freshTimestamp();
            $model->updated_at = \Carbon\Carbon::now(); //$model->freshTimestamp();
        });

        static::updating( function ($model){
            $model->created_at = \Carbon\Carbon::now(); //$model->freshTimestamp();
            $model->updated_at = \Carbon\Carbon::now(); //$model->freshTimestamp();
        });
    }

    public function user()
    {
        return $this->belongsTo(User:: class, "email");
    }
}
