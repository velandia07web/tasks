<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Status
 *
 * @property $id
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property Task[] $tasks
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Status extends Model
{
    
    static $rules = [
		'status' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany('App\Models\Task', 'statuses', 'id');
    }
    

}
