<?php

class Product extends \Eloquent
{
    protected $fillable = [];

    public static function getCombpro()
    {
        $data = Product::orderBy('id', 'desc')->lists('name', 'id');
        return $data;

    }
}