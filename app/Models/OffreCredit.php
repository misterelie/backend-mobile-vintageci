<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffreCredit extends Model
{
    use HasFactory;

    protected $table = "offre_credits";
    public $incrementing = true;
    protected $guarded = [];


    public function purchases()
    {
        return $this->hasMany(PurchaseCredit::class, 'credit_id')->where(['statut'=> 1, 'deleted' => 0]);
    }
    

}
