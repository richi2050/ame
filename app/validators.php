<?php

Validator::extend('alpha_spaces', function($attribute, $value, $parameters)
{
    return  preg_match("/^[a-zA-Z áéíóúAÉÍÓÚÑñ]+$/",$value);

});




Validator::extend('ip',function($attribute,$value,$parameters){
    $value=explode(".",$value);
    $ip=$value[0].$value[1].$value[2].$value[3];
    if(is_numeric($ip)){
        if(strlen($ip)>12){
            return false;
        }else{
            return true;
        }

    }else{
        return false;
    }
    //return  preg_match("/^[a-zA-Z áéíóúAÉÍÓÚÑñ]+$/",$value);
});