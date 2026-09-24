<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    use HasFactory;

    /**
     * These fields are allowed to be mass-assigned via Otp::create([...])
     */
    protected $fillable = [
        'user_id',
        'code',
        'expires_at',
    ];
}
