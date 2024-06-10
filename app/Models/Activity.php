<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'type',
        'description',
        'user_id',
        'start_date',
        'due_date',
        'completion_date',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
