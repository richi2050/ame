<?php

class Tools extends \Eloquent {
protected $fillable = [];


    public static function ano(){
        $ano = array();
        $ano += array('0' => '-- Seleciona Año --');
        $i = 2014;
        for($i;$i >= 1914; $i--){

            $ano+= array($i => $i);
        }
           return $ano;
    }

    public static function mes(){
        $mes =array();
        $mes +=array('0' => '-- Seleciona Mes --');
        $mes += array(
            '1'   => '1',
            '2'   => '2',
            '3'   => '3',
            '4'   => '4',
            '5'   => '5',
            '6'   => '6',
            '7'   => '7',
            '8'   => '8',
            '9'   => '9',
            '10'   => '10',
            '11'   => '11',
            '12'   => '12');
        return $mes;

    }

    public static function dias(){
        $i=1;
        $dia =array();
        $dia += array('0' => '-- Selecciona Día --');
        for($i;$i<= 31; $i++){

            $dia+= array($i => $i);
        }

        return $dia;
    }

}