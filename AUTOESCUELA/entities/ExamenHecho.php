<?php

class ExamenHecho{
    public $idExamen;
    public $idUsuario;
    public $fecha;
    public $calificacion;
    public $ejecucion;

    public function __construct($row){
        $this->idExamen = $row['id_examen'];
        $this->idUsuario = $row['id_usuario'];
        $this->fecha = $row['fecha'];
        $this->calificacion = $row['calificacion'];
        $this->ejecucion = $row['ejecucion'];
    }
    
    public function muestra(){
        $cadena = "";

        $cadena = "<p>".$this->idExamen." ".$this->idUsuario." ".$this->fecha." ".$this->calificacion." ".$this->ejecucion;

        print $cadena;
    }

    public static function arrayParaConstructor($idExamen, $idUsuario, $fecha, $calificacion, $ejecucion){
        $a=array('id_examen' => $idExamen, 'id_usuario' => $idUsuario, 'fecha' => $fecha, 'calificacion' => $calificacion, 'ejecucion' => $ejecucion);

        return $a;
    }
}

?>