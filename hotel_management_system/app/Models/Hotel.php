<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    protected $table = 'hotels';
    protected $primaryKey = 'id'; // Fix capitalization

    protected $fillable = ['name', 'image', 'description', 'status'];

    use HasFactory;
}

