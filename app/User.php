<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class User extends Authenticatable implements HasMedia
{
    use Notifiable;
    use HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'middle_names',
        'last_name',
        'nickname', 
        'email', 
        'password',
        'phone_number',
        'birthday',
        'gender',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token',
    ];

    /**
     * Get all todo's this user has created
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function todos_created()
    {
        return $this->hasMany('App\Todo', 'user_id');
    }

    /**
     * Get all todo's this user is an assignee of
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function todos_assignee()
    {
        return $this->hasMany('App\Todo', 'assignee_id');
    }

    /**
     * Get all todo's this user has assigned to someone
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function todos_assigner()
    {
        return $this->hasMany('App\Todo', 'assigner_id');
    }
}
