<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PettyCash extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'description',
        'amount',
        'type',
        'user_id'
    ];
}
