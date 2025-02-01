<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Hotel extends Model
{
    private $table = 'hotels';
    private $primarykey = 'id';
    private $fillable = ['name', 'image','description','status'];


    use HasFactory;
    
}
