<?php

class Job extends \Eloquent
{
    protected $fillable = [];

    public static function getComboJob()
    {
        $data = Job::orderBy('name', 'asc')->lists('name', 'id');
        return $data;
    }
}