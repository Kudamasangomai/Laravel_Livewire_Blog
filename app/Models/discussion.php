<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class discussion extends Model
{
    use HasFactory;
    protected $fillable = [
        'topic', 'discussion_body',
    ];
    
    public function userliked(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function likes()
    {
        return $this->hasMany('App\Models\discussion_likes');

    }

    public function comments()
    {
        return $this->hasMany('App\Models\comments');

    }
}
