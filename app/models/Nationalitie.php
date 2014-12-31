<?php

class Nationalitie extends \Eloquent {
	protected $fillable = [];

    public static function getAll(){
        $data = Nationalitie::orderBy('id','asc')->lists('name', 'id');
        return $data;
    }
}