<?php

class Tematica{
    public $idTematica;
    public $tema;

    public function __construct($row){
        $this->idTematica = $row['id_tematica'];
        $this->tema = $row['tema'];
    }
    
    public function muestra(){
        $cadena = "";

        $cadena = "<p>".$this->idTematica." ".$this->tema;

        print $cadena;
    }

    public static function arrayParaConstructor($idTematica, $tema){
        $a=array('id_tematica' => $idTematica, 'tema' => $tema);

        return $a;
    }
}

?>