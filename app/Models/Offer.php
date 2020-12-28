<?php

namespace App\Models;

use App\models\Users;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = 'offers';
    protected $fillable = [
        'user_id',
        'job_id',
        'owner_id',
    ];
    public function user()
    {
        return $this->BelongsTo(Users::class, 'user_id', 'id');
    }
    public function jobs()
    {
        return $this->BelongsTo(Job::class, 'job_id', 'id');
    }
    public function owner()
    {
        return $this->BelongsTo(Users::class, 'owner_id', 'id');
    }
}
