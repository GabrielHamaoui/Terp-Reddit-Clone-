<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    // make fillable

    public function path() {
        return route('posts.show', $this);
    }

    public function user() {
        return $this->belongsTo(User::class, 'userId'); // check foreign key
    }

    public function votes() {
        return $this->hasMany(Votes::class); // foreign key?
    }

    public function upvote() {

            $this->votes()->updateOrCreate([
                'userId' => auth()->id(),
            ], [
                'value' => '1',
            ]);

    }

    public function downvote() {
        $this->votes()->updateOrCreate([
            'userId' => auth()->id(),
        ], [
            'value' => '-1',
        ]);
    }

     public function isLikedBy(User $user) {
        
     }
}
