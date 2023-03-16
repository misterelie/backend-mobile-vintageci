<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffreVip extends Model
{
    use HasFactory;

    protected $table = "offre_vips";
    public $incrementing = true;
    protected $guarded = [];

    public function annonces()
    {
        return $this->hasMany(AnnonceVip::class, 'offre_id')->where(['statut'=> 1, 'deleted' => 0]);
    }

    public function purchasecount()
    {
        return $this->hasMany(AnnonceVip::class, 'offre_id')->where('statut', 1);
    }
}
