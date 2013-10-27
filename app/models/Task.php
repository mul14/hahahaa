<?php

/**
 * Task Model
 */
class Task extends BaseModel
{
    /**
     * Name of table
     * @var string
     */
    protected $table = 'task';

    /**
     * Name of collection if using database like MongoDB
     * @var string
     */
    protected $collection = 'task';

    /**
     * Guard the fields from massive assigment
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Validation rules
     * @var array
     */
    public static $rules = [
        'project_id' => 'required',
        'name' => 'required',
    ];

    /**
     * Belongs to relations
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo('Project');
    }

}
