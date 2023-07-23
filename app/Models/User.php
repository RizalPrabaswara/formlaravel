<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Wildside\Userstamps\Userstamps;
use \Znck\Eloquent\Traits\BelongsToThrough;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Userstamps;
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;
    //use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function districts()
    // {
    //     return $this->belongsToThrough(District::class, [Cities::class, Countries::class])->withTrashed('users.deleted_at');
    // }

    // public function countries2()
    // {
    //     return $this->hasManyDeep(
    //         District::class,
    //         [Countries::class, Cities::class],
    //         [
    //             'id_country',
    //             'id_city',
    //             'id_district'
    //         ],
    //         [
    //             'id', // Local key on the "countries" table.
    //             'id', // Local key on the "users" table.
    //             'id'  // Local key on the "posts" table.
    //         ]
    //     );
    // }

    public function countries()
    {
        return $this->belongsTo(Countries::class, 'countries_id');
    }

    public function cities()
    {
        return $this->belongsTo(Cities::class, 'cities_id');
    }

    public function districts()
    {
        return $this->belongsTo(District::class, 'districts_id');
    }

    public function job()
    {
        return $this->belongsTo(Jabatan::class, 'jobs_id');
    }

    public function skills()
    {
        //return $this->belongsToMany(Skill::class, 'skill_sets', 'candidate_id', 'id_skill');
        // return $this->belongsToMany(Skill::class, 'skill_sets')
        //     ->withPivot('skill_list')
        //     ->withTimestamps();
        return $this->belongsToMany(Skill::class, 'skill_user', 'user_id', 'skill_id');
    }
}
