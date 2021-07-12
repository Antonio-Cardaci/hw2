<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class preferiti extends Model
{
    use HasFactory;

    protected $fillable=[
        'username',
        'titolo'
    ];

    protected $table = 'preferiti';
}
