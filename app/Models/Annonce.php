<?php

namespace App\Models;

use App\Helpers\User as UserHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Annonce extends Model
{
    use HasFactory;

    protected $table = "annonces";
    public $incrementing = true;
    protected $guarded = [];

    protected $casts= [
        "statut" => "integer",
        "retire" => 'boolean',
        "created_at" => "datetime",
        "updated_at" => "datetime",
    ];


    public static function boot(){
        parent::boot();
        static::creating( function ($model){
            $model->user_id = UserHelper::userId();
            $model->pk = Str::random(12);
        });
    }


    public function sousCategory()
    {
        return $this->belongsTo(SousCategory::class, "sous_category_id");
    }

    public function category()
    {
        return $this->belongsTo(Category::class, "category_id");
    }


    public function commune()
    {
        return $this->belongsTo(Commune::class, "commune_id");
    }


    public function author()
    {
        return $this->belongsTo(User::class, "user_id")->where(["deleted" => 0]);
    }

    public function photos(){
        return $this->hasMany(Photo::class, 'annonce_id');
    }

    public function annonces(){
        return $this->hasMany(Annonce::class, 'commune_id');
    }

    public function cover(){
        return $this->hasOne(Photo::class, 'annonce_id');
    }

    public function topAnnonce(){
        return $this->hasMany(Annonce::class, 'commune_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');//->where(["deleted" => 0]);
    }

    public function vip(){
        return $this->hasOne(AnnonceVip::class, 'annonce_id')->where(['statut' => 1, 'deleted' => 0] );
    }

    public function fichiers(){
        return $this->hasMany(Fichier::class, 'annonce_id');
    }
    
}
