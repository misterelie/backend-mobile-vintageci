<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class AnnonceVip extends Model
{
    use HasFactory;

    protected $table = "annonce_vips";
    public $incrementing = true;
    protected $guarded = [];

    protected $casts= [
        "statut" => "integer",
        "deleted" => "integer",
    ];

    protected $date = ["created_at", "updated_at", "date"];

    public static function boot(){
        parent::boot();
        static::creating( function ($model){
            $model->date = Carbon::now();
        });

        static::updating( function ($model){
            $model->date = Carbon::now();
        });
    }

    public function offre()
    {
        return $this->belongsTo(OffreVip::class, "offre_id")->where(["deleted" => 0])->where("id", "!=", NUll);
    }

    public function annonce(){
        return $this->belongsTo(Annonce::class, 'annonce_id');
    }

    // public function user(){
    //     return $this->belongsTo(User::class, 'user_id');//->where(["deleted" => 0]);
    // }
}
