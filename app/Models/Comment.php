<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'article_id',  // Add 'article_id' to the fillable array
        'user_id',
        'body',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}

