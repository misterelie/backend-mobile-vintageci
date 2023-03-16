<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;


class Notification extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table="notifications";
    public $incrementing = true;

    // public static function boot()
    // {
    //     parent::boot();
    //     static::creating( function ($model){
    //         $model->user_id = Session::get("user_id");
    //     });
    // }

    public function notififiable()
    {
        return $this->morphTo("notifiable", "notifiable_type", "notifiable_id");
    }

    public function annonces()
    {
        return $this->hasMany(Annonces::class,"annonce_id");
    }
}
