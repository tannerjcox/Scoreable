<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    /**
     * The attributes that should be considered dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'score', 'user_id', 'sport_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
