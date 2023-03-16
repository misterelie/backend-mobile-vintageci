<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\User as UserHelper;
class Commune extends Model
{
    use HasFactory;

    protected $table = "communes";
    public $incrementing = true;
    protected $guarded = [];

    public static function boot(){
        parent::boot();

        static::creating( function ($model){
            $model->user_id = UserHelper::userId();
        });
    }

    public function annonces()
    {
        return $this->hasMany(Annonce::class, "commune_id")->where(["deleted" => 0, "retire" => false])->where('statut',"!=",3);
    }

    public function author()
    {
        return $this->belongsTo(User::class, "user_id")->where("id", "!=", NUll);
    }
}
