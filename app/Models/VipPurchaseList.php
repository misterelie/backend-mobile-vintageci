<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Helpers\User as UserHelper;

class VipPurchaseList extends Model
{
    use HasFactory;


    protected $table = "vip_purchase_lists";
    public $incrementing = true;
    protected $guarded = [];


    public static function boot(){
        parent::boot();
        static::creating( function ($model){
            $model->user_id = UserHelper::userId();
        });
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');//->where(["deleted" => 0]);
    }

    public function offre()
    {
        return $this->belongsTo(OffreVip::class, 'offre_id');
    }
}
