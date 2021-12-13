<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use InvalidArgumentException;

class Task extends Model
{
    protected $fillable = [
        'name',
        'details',
        'status',
        'priority',
        'start_time',
        'finish_time',
        'time_spent',
    ];

    /**
     * Rate the article.
     *
     * @param int $rating
     * @param int|null $comment
     * @param int|null $task_user
     * @return Model
     */
    public function rate($rating, $task_user = null, $comment = null)
    {
        if ($rating > 5 || $rating < 1) {
            throw new InvalidArgumentException('Ratings must be between 1-5.');
        }
//        $userId = $user ? $user->id : auth()->id();
        $rating_user = $task_user ? $task_user : auth();

//        return $this->ratings()->where([
//            ['task_id', $this->id],
//            ['user_id', $rating_user->id],
//        ])->updateOrCreate(
//            ['comment' => $comment],
//            ['rating' => $rating]
//        )->user()->associate($rating_user);
        return $this->ratings()->updateOrCreate(
            ['task_id' => $this->id, 'user_id' => $rating_user->id],
            ['rating' => $rating, 'comment' => $comment]
        );
    }

    /**
     * Fetch the average rating for the task.
     *
     * @return float
     */
    public function rating()
    {
        return $this->ratings->avg('rating');
    }

    /**
     * Get all ratings for the task.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ratings()
    {
//        return $this->hasMany('App\Rating')->avg('rating');
        return $this->hasMany('App\Rating');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
