<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Task
 *
 * @property $id
 * @property $title
 * @property $description
 * @property $end_date
 * @property $created_at
 * @property $updated_at
 * @property $developer
 * @property $statuses
 *
 * @property Developer $developer
 * @property Status $status
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Task extends Model
{
    
    static $rules = [
		'title' => 'required',
		'description' => 'required',
		'end_date' => 'required',
        'developer' => 'required',
        'statuses' => 'required',
        'start_date'  => 'required',
        'upload_files' => 'required',
        'Report' => 'required'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','description','end_date','developer','statuses','start_date','upload_files','Report'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function developer()
    {
        //return $this->belongsTo('App\Models\Developer',  'developer');
        return $this->belongsTo(Developer::class, 'developer');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'statuses');
    }
    

}
