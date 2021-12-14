<?php

class ExamenPregunta{
    public $idExamen;
    public $idPregunta;

    public function __construct($row){
        $this->idExamen = $row['id_examen'];
        $this->idPregunta = $row['id_pregunta'];
    }
    
    public function muestra(){
        $cadena = "";

        $cadena = "<p>".$this->idExamen." ".$this->idPregunta;

        print $cadena;
    }

    public static function arrayParaConstructor($idExamen, $idPregunta){
        $a=array('id_examen' => $idExamen, 'id_pregunta' => $idPregunta);

        return $a;
    }
}

?>