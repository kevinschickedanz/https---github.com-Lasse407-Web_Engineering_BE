<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    use HasFactory;

    protected $fillable = ['speaker'];

    public function lectures(){
        return $this->belongsToMany(Lecture::Class)->withTimestamps();;
    }
}
