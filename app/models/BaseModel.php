<?php

abstract class BaseModel extends \Eloquent
{
    public $errors;

    public static function boot()
    {
        parent::boot();

        // Do validation everytime when saving the model
        static::saving(function($model){

            return $model->validate();

        });
    }

    /**
     * Validation
     * @return boolean
     */
    public function validate()
    {
        $validation = \Validator::make($this->getAttributes(), static::$rules);

        if ($validation->fails())
        {
            $this->errors = $validation->messages();

            return false;
        }

        return true;
    }
}
