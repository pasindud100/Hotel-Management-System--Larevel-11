<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    protected $table = 'hotels';
    protected $primaryKey = 'id'; 

    protected $fillable = ['name', 'image', 'description', 'status'];

    // one side of the one(hotel) to many(rooms) relationshil
    public function rooms(){
        return $this->hasMany(Hotel::class, 'hotel_id');
    }

    use HasFactory;
}

