<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    protected $fillable = [
        'user_id',
        'job_id',
        'owner_id',
        'transfer_proof',
        'workerver',
        'adminver',
        'status',
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
