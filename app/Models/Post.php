<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // If table name is 'posts', you can skip this line
    protected $table = 'posts';

    // Allow mass assignment for these fields
    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

