<?php

class Examen{
    public $idExamen;
    public $descripcion;
    public $duracion;
    public $activo;

    public function __construct($row){
        $this->idExamen = $row['id_examen'];
        $this->descripcion = $row['descripcion'];
        $this->duracion = $row['duracion'];
        $this->activo = $row['activo'];
    }
    
    public function muestra(){
        $cadena = "";

        $cadena = "<p>".$this->id." ".$this->descripcion." ".$this->duracion." ".$this->activo;

        print $cadena;
    }

    public static function arrayParaConstructor($id, $descripcion, $duracion, $activo){
        $a=array('id_examen' => $id, 'descripcion' => $descripcion, 'duracion' => $duracion, 'activo' => $activo);

        return $a;
    }
}

?>