<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'description',
        'status',
        'user_id',
        'assignee_id',
        'assigner_id',
        'parent_id',
        'deadline',
        'milestone_id',
        'created_at',
        'updated_at',
    ];

    /**
     * Get all todo's this is a dependant of
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo('App\Todo', 'parent_id');
    }

    /**
     * Get all todo's that depend on this instance
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany('App\Todo', 'parent_id');
    }

    /**
     * Get the user that created this todo.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Get the user assigned to this todo
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assignee()
    {
        return $this->belongsTo('App\User', 'assignee_id');
    }

    /**
     * Get the user that assigned this todo
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assigner()
    {
        return $this->belongsTo('App\User', 'assigner_id');
    }

    //TODO: create Miltestone model and link it to Todo
}
