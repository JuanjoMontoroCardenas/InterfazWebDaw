<?php

class DB{

    private static $user = "root";
    private static $passwd = "";
    private static $conn;
    public static function connect(){
        self::$conn = new PDO('mysql:host=localhost;dbname=autoescuela', self::$user, self::$passwd);
    }

    public static function disconnect(){
        self::$conn = null;
    }

    //EXAMEN
    public static function obtieneExamenes(){

        $examns = array();

        $select = self::$conn->query("SELECT * FROM `examen`");
        while($registro = $select->fetch()){
            $e = new Examen($registro);
            $examns[] = $e;
        }

        return $examns;
    }

    public static function obtieneExamen($id){

        $select = self::$conn->query("SELECT * FROM `examen` WHERE `id_examen` = $id");
        while($registro = $select->fetch()){
            $e = new Examen($registro);
        }

        return $e;
    }

    public static function altaExamen(Examen $e){
        $insert = self::$conn->prepare("INSERT INTO `examen`(`id_examen`, `descripcion`, `duracion`, `num_preguntas`, `activo`) VALUES (?,?,?,?,?)");
        
        $insert->bindParam(1,$e->idExamen);
        $insert->bindParam(2,$e->descripcion);
        $insert->bindParam(3,$e->duracion);
        $insert->bindParam(4,$e->numPreguntas);
        $insert->bindParam(5,$e->activo);

        $insert->execute();
    }
    
    public static function existeExamen($id)
    {

        $sql = "SELECT * FROM 'examen' WHERE id_examen='$id'";
            
            if($resultado = self::$conn->query($sql))
             {
                $fila = $resultado->fetch();
                return ($fila != null);
             }             
    }


    //EXAMEN HECHO
    public static function obtieneExamenesHechosDeAlumno($idUsuario){
        $examns = array();

        $select = self::$conn->query("SELECT * FROM `examen_hecho` WHERE `id_usuario` = '$idUsuario'");
        while($registro = $select->fetch()){
            $e = new ExamenHecho($registro);
            $examns[] = $e;
        }

        return $examns;
    }

    public static function obtieneExamenHecho($id, $idUsuario, $fecha){

        $select = self::$conn->query("SELECT * FROM `examen_hecho` WHERE `id_examen` = '$id' AND id_usuario='$idUsuario' AND fecha='$fecha'");
        while($registro = $select->fetch()){
            $e = new ExamenHecho($registro);
        }

        return $e;
    }

    public static function altaExamenHecho(ExamenHecho $e){
        $insert = self::$conn->prepare("INSERT INTO `examen_hecho`(`id_examen`, `id_usuario`, `fecha`, `calificacion`, `ejecucion`) VALUES (?,?,?,?,?)");
        
        $insert->bindParam(1,$e->idExamen);
        $insert->bindParam(2,$e->idUsuario);
        $insert->bindParam(3,$e->fecha);
        $insert->bindParam(4,$e->calificacion);
        $insert->bindParam(5,$e->ejecucion);

        $insert->execute();
    }
     
    public static function existeExamenHecho($id, $idUsuario)
    {

        $sql = "SELECT * FROM 'examen_hecho' WHERE id_examen='$id' AND id_usuario='$idUsuario'";
            
            if($resultado = self::$conn->query($sql))
             {
                $fila = $resultado->fetch();
                return ($fila != null);
             }             
    }

    public static function existeExamenHechoFecha($id, $idUsuario, $fecha)
    {

        $sql = "SELECT * FROM 'examen_hecho' WHERE id_examen='$id' AND id_usuario='$idUsuario' AND fecha='$fecha'";
            
            if($resultado = self::$conn->query($sql))
                {
                $fila = $resultado->fetch();
                return ($fila != null);
                }         
                
    }


    //EXAMEN PREGUNTAS
    public static function obtienePreguntasDeExamen($idExamen){
        $preguntas = array();

        $select = self::$conn->query("SELECT * FROM `examen_preguntas` WHERE `id_examen` = '$idExamen'");
        while($registro = $select->fetch()){
            $e = new ExamenPregunta($registro);
            $preguntas[] = $e->idPregunta;
        }

        return $preguntas;
    }

    public static function altaExamenPregunta(ExamenPregunta $e){
        $insert = self::$conn->prepare("INSERT INTO `examen_preguntas`(`id_examen`, `id_pregunta`) VALUES (?,?)");
        
        $insert->bindParam(1,$e->idExamen);
        $insert->bindParam(2,$e->idPregunta);

        $insert->execute();
    }
    
    public static function existeExamenPregunta($id, $idUsuario, $fecha)
    {

        $sql = "SELECT * FROM 'examen_preguntas' WHERE id_examen='$id' AND id_usuario='$idUsuario' AND fecha='$fecha'";
            
            if($resultado = self::$conn->query($sql))
             {
                $fila = $resultado->fetch();
                return ($fila != null);
             }             
    }

    
    //PREGUNTAS
    public static function obtienePreguntas(){
        $preguntas = array();

        $select = self::$conn->query("SELECT * FROM `preguntas`");
        while($registro = $select->fetch()){
            $p = new Pregunta($registro);
            $preguntas[] = $p;
        }

        return $preguntas;
    }

    public static function obtienePregunta($id){

        $select = self::$conn->query("SELECT * FROM `preguntas` WHERE `id_pregunta` = '$id'");
        while($registro = $select->fetch()){
            $p = new Pregunta($registro);
        }

        return $p;
    }

    public static function obtienePreguntaPorEnunciado($enunciado){

        $select = self::$conn->query("SELECT * FROM `preguntas` WHERE `enunciado` = '$enunciado'");
        while($registro = $select->fetch()){
            $p = new Pregunta($registro);
        }

        return $p;
    }

    public static function altaPregunta(Pregunta $e){
        $insert = self::$conn->prepare("INSERT INTO `preguntas`(`id_pregunta`, `enunciado`, `recurso`, `id_respuesta`, `id_tematica`) VALUES (?,?,?,?,?)");
        
        $insert->bindParam(1,$e->idPregunta);
        $insert->bindParam(2,$e->enunciado);
        $insert->bindParam(3,$e->recurso);
        $insert->bindParam(4,$e->idRespuesta);
        $insert->bindParam(5,$e->idTematica);

        $insert->execute();
    }
    
    public static function existePregunta($id)
    {

        $sql = "SELECT * FROM 'preguntas' WHERE id_pregunta = '$id'";
            
            if($resultado = self::$conn->query($sql))
             {
                $fila = $resultado->fetch();
                return ($fila != null);
             }             
    }

    
    public static function asignaRespuestaCorrecta($enunciadoPregunta, $enunciadoRespuesta)
    {

        $idP = self::obtienePreguntaPorEnunciado($enunciadoPregunta)->idPregunta;
        $idR = self::obtieneRespuestaPorEnunciado($enunciadoRespuesta)->idRespuesta;

        $alter = self::$conn->prepare("UPDATE `preguntas` SET `id_respuesta`=? WHERE `id_pregunta` = ?");
        $alter->bindParam(1, $idR);
        $alter->bindParam(2, $idP);
        
        $alter->execute();
    }

    
    //RESPUESTAS
    public static function obtieneRespuestas(){
        $respuestas = array();

        $select = self::$conn->query("SELECT * FROM `respuestas`");
        while($registro = $select->fetch()){
            $r = new Respuesta($registro);
            $respuestas[] = $r;
        }

        return $respuestas;
    }

    public static function obtieneRespuesta($id){

        $select = self::$conn->query("SELECT * FROM `respuestas` WHERE `id_respuesta` = '$id'");
        while($registro = $select->fetch()){
            $r = new Respuesta($registro);
        }

        return $r;
    }

    public static function obtieneRespuestaPorEnunciado($enunciado){

        $select = self::$conn->query("SELECT * FROM `respuestas` WHERE `enunciado` = '$enunciado'");
        while($registro = $select->fetch()){
            $r = new Respuesta($registro);
        }

        return $r;
    }

    public static function altaRespuesta(Respuesta $r){
        $insert = self::$conn->prepare("INSERT INTO `respuestas`(`id_respuesta`, `enunciado`, `id_pregunta`) VALUES (?,?,?)");
        
        $insert->bindParam(1,$r->idRespuesta);
        $insert->bindParam(2,$r->enunciado);
        $insert->bindParam(3,$r->idPregunta);

        $insert->execute();
    }
    
    public static function existeRespuesta($id)
    {

        $sql = "SELECT * FROM 'respuestas' WHERE id_respuesta = '$id'";
            
            if($resultado = self::$conn->query($sql))
             {
                $fila = $resultado->fetch();
                return ($fila != null);
             }             
    }

    
    //TEMATICA
    public static function obtieneTematicas(){
        $tematicas = array();

        $select = self::$conn->query("SELECT * FROM `tematica`");
        while($registro = $select->fetch()){
            $t = new Tematica($registro);
            $tematicas[] = $t;
        }

        return $tematicas;
    }

    public static function obtieneTematica($id){

        $select = self::$conn->query("SELECT * FROM `tematica` WHERE `id_tematica` = $id");
        while($registro = $select->fetch()){
            $t = new Tematica($registro);
        }

        return $t;
    }

    public static function altaTematica(Tematica $t){
        $insert = self::$conn->prepare("INSERT INTO `tematica`(`tema`) VALUES (?)");
        
        $insert->bindParam(1,$t->tema);

        $insert->execute();
    }
    
    public static function existeTematica($id)
    {

        $sql = "SELECT * FROM 'tematica' WHERE id_tematica = '$id'";
            
            if($resultado = self::$conn->query($sql))
             {
                $fila = $resultado->fetch();
                return ($fila != null);
             }             
    }


    //USUARIO
    public static function obtieneUsuarios(){
        $users = array();

        $select = self::$conn->query("SELECT * FROM `usuarios`");
        while($registro = $select->fetch()){
            $u = new Usuario($registro);
            $users[] = $u;
        }

        return $users;
    }

    public static function obtieneUsuario($email){ //nombre es la PK por ahora

        $select = self::$conn->query("SELECT * FROM `usuarios` WHERE `email` = $email");
        while($registro = $select->fetch()){
            $u = new Usuario($registro);
        }
        return $u;
    }

    public static function altaUsuario(Usuario $u){
        $insert = self::$conn->prepare("INSERT INTO `usuarios`(`email`, `nombre`, `apellidos`, `password`, `fecha_nac`, `rol`, `foto`, `activo`) VALUES (?,?,?,?,?,?,?,?)");
        
        $insert->bindParam(1,$u->email);
        $insert->bindParam(2,$u->nombre);
        $insert->bindParam(3,$u->apellidos);
        $insert->bindParam(4,$u->password);
        $insert->bindParam(5,$u->fechaNac);
        $insert->bindParam(6,$u->rol);
        $insert->bindParam(7,$u->foto);
        $insert->bindParam(8,$u->activo);

        $insert->execute();
    }
    
    public static function existeUsuario($email, $password)
    {

        $sql = "SELECT * FROM 'usuarios' WHERE email='$email' AND password='$password'";
            
            if($resultado = self::$conn->query($sql))
             {
                $fila = $resultado->fetch();
                return ($fila != null);
             }             
    }

}