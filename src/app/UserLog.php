<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class UserLog extends Model 
{
   
    protected $table = "user_log";
     /**
     * @inheritDoc
     */
    protected $fillable = [
        'user_id',
        'ip',
        'user_agent',
        'info',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'info' => 'array',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}