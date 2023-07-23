<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Staudenmeir\EloquentHasManyDeep\HasRelationships;

class District extends Model
{
    use HasFactory;

    public function cities()
    {
        return $this->belongsTo(Cities::class, 'cities_id');
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    // public function district(){
    //     return $this->hasManyDeep(User::class, [Cities::class, Countries::class]);
    // }
}
