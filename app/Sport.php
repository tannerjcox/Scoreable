<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    /**
     * The attributes that should be considered dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at'
    ];
    protected $dateFormat = 'Y-m-d H:i:s';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function creator()
    {
        return $this->users()->orderBy('created_at', 'desc')->first();
    }
}
