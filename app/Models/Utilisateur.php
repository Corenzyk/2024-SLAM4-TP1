<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'password'];

    public function todos()
    {
        return $this->hasMany(Todo::class);
    }
}
