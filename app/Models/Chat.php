<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

      // Fields that can be mass-assigned
    protected $fillable = [
        'pharmacy_name',
        'pharmacy_email',
        'pharmacy_contact',
    ];
}
