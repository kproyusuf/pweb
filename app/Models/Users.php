<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'name',
        'lname',
        'email',
        'email_verified_at',
        'password',
        'address',
        'phone',
        'picture',
        'resume',
        'no_rek',
        'role_as',
        'isverified',
        'job_id',
        'workerver',
        'ownerver',
    ];

    public function job()
    {
        return $this->hasMany(Job::class);
    }
    public function worker()
    {
        return $this->has(worker::class);
    }
    public function jobs()
    {
        return $this->BelongsTo(Job::class, 'job_id', 'id');
    }
}
