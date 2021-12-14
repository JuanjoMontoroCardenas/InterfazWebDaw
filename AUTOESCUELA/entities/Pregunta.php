<?php

class Pregunta{
    public $idPregunta;
    public $enunciado;
    public $recurso;
    public $idRespuesta;
    public $idTematica;

    public function __construct($row){
        $this->idPregunta = $row['id_pregunta'];
        $this->enunciado = $row['enunciado'];
        $this->recurso = $row['recurso'];
        $this->idRespuesta = $row['id_respuesta'];
        $this->idTematica = $row['id_tematica'];
    }
    
    public function muestra(){
        $cadena = "";

        $cadena = "<p>".$this->idPregunta." ".$this->enunciado." ".$this->recurso." ".$this->idRespuesta." ".$this->idTematica;

        print $cadena;
    }

    public static function arrayParaConstructor($idPregunta, $enunciado, $recurso, $idRespuesta, $idTematica){
        $a=array('id_pregunta' => $idPregunta, 'enunciado' => $enunciado, 'recurso' => $recurso, 'id_respuesta' => $idRespuesta, 'id_tematica' => $idTematica);

        return $a;
    }
}

?>