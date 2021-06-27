<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $table = 'history';

    protected $fillable = [
        'code',
        'payment_url',
        'method',
        'crm_name',
        'crm_email',
        'price',
        'paid',
        'duitku_ref',
        'expired_at',
    ];

    protected $casts = [
        'price' => 'integer',
        'paid' => 'integer',
    ];

}
