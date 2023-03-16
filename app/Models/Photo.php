<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $table = "photos";
    public $incrementing = true;
    protected $guarded = [];


    public function annonce()
    {
        return $this->belongsTo(Annonce::class, "annonce_id");
    }
}
