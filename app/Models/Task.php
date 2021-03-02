<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'assigned_user_id',
        'creator_user',
        'start_date',
        'limit_date',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'assigned_user_id');
    }

}
