<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    use HasFactory;

    public function cities()
    {
        return $this->hasMany(Cities::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
