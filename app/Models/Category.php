<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\User as UserHelper;
class Category extends Model
{
    use HasFactory;

    protected $table = "categories";
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
        return $this->hasMany(Annonce::class, "category_id")->where(["deleted" => 0, "statut" => 1, "retire" => false]);
    }

    public function sousCategories()
    {
        return $this->hasMany(SousCategory::class, "category_id");
    }

    public function author()
    {
        return $this->belongsTo(User::class, "user_id")->where("id", "!=", NUll);
    }
}
