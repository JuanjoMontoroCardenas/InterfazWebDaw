<?php

class Usuario{
    public $idUsuario;
    public $email;
    public $nombre;
    public $apellidos;
    public $password;
    public $fechaNac;
    public $rol;
    public $foto;
    public $activo;

    public function __construct($row){
        $this->idUsuario = $row['id_usuario'];
        $this->email = $row['email'];
        $this->nombre = $row['nombre'];
        $this->apellidos = $row['apellidos'];
        $this->password = $row['password'];
        $this->fechaNac = $row['fecha_nac'];
        $this->rol = $row['rol'];
        $this->foto = $row['foto'];
        $this->activo = $row['activo'];
    }
    
    public function muestra(){
        $cadena = "";

        $cadena = "<p>".$this->idUsuario." ".$this->email." ".$this->nombre." ".$this->apellidos." ".$this->password." ".$this->fechaNac." ".$this->rol." ".$this->foto." ".$this->activo;

        print $cadena;
    }

    public static function arrayParaConstructor($idUsuario, $email, $nombre, $apellidos, $password, $fechaNac, $rol, $foto, $activo){
        $a=array('id_usuario' => $idUsuario, 'email' => $email, 'nombre' => $nombre, 'apellidos' => $apellidos, 'password' => $password, 'fecha_nac' => $fechaNac, 'rol' => $rol, 'foto' => $foto, 'activo' => $activo);

        return $a;
    }
}

?>