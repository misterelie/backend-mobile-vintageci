<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountValidation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = "account_validations";
    protected $guarded = [];
    protected $casts = [
        'token_received_at' => 'datetime',
    ];

    protected $dates = [
    "created_at",
    "updated_at",
    ];
}
