<?php

/**
 * Project Model
 */
class Project extends BaseModel
{
    /**
     * Name of table
     * @var string
     */
    protected $table = 'project';

    /**
     * Name of collection if using database like MongoDB
     * @var string
     */
    protected $collection = 'project';

    /**
     * Guard the fields from massive assigment
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Validation rules
     * @var array
     */
    public static $rules = [];

    /**
     * Has Many relations
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function task()
    {
        return $this->hasMany('Task');
    }
}
