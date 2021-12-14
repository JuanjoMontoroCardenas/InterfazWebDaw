<?php

class Respuesta{
    public $idRespuesta;
    public $enunciado;
    public $idPregunta;

    public function __construct($row){
        $this->idRespuesta = $row['id_respuesta'];
        $this->enunciado = $row['enunciado'];
        $this->idPregunta = $row['id_pregunta'];
    }
    
    public function muestra(){
        $cadena = "";

        $cadena = "<p>".$this->idRespuesta." ".$this->enunciado." ".$this->idPregunta;

        print $cadena;
    }

    public static function arrayParaConstructor($idRespuesta, $enunciado, $idPregunta){
        $a=array('id_respuesta' => $idRespuesta, 'enunciado' => $enunciado, 'id_pregunta' => $idPregunta);

        return $a;
    }
}

?>