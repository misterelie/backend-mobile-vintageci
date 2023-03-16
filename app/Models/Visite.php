<?php

namespace App\Models;

use App\Helpers\Agent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visite extends Model
{
    use HasFactory;

    protected $table = "visites";
    public $incrementing = true;
    protected $guarded = [];

    public static function boot(){
        parent::boot();
        static::creating( function ($model){
            $model->user_ip = Agent::ip();
        });
    }
}
