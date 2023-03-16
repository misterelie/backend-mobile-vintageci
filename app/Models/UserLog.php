<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\User as UserHelper;

class UserLog extends Model
{
    use HasFactory;

    protected $table = "user_logs";
    public $incrementing = true;
    protected $guarded = [];

    public static function boot(){
        parent::boot();
        static::creating( function ($model){
            $model->user_id = UserHelper::userId();
        });
    }


    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
