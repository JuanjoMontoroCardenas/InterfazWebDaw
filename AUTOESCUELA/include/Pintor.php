<?php

require_once './entities/Tematica.php';
require_once './entities/Pregunta.php';
require_once './entities/Examen.php';
require_once './include/GBD.php';

function pintaSelectTematicas($a){
    $select="";
    try{
        DB::connect();

        $tematicas = DB::obtieneTematicas();
        if($a){
            $select="<select name=\"tematica\" id=\"tematica\">";
            foreach ($tematicas as $tema){
                $select = $select . "<option value=\"$tema->idTematica\">$tema->tema</option>";
            }
            $select=$select."</select>";
            echo $select;
        }

        DB::disconnect();

    }catch (PDOException $e) {
        print "¡ERROR!: ". $e->getMessage() . "<br/>";
        die();
    }
}

function pintaUlPregPosibles($a){
    $table="";
    try{
        DB::connect();

        $preguntas = DB::obtienePreguntas();
        if($a){
            $ul="<ul class=\"pregSelec\" ondrop=\"drop(event)\" ondragover=\"allowDrop(event)\">";
            foreach ($preguntas as $pregunta){
                $idPreg = $pregunta->idPregunta;
                $enuncia = $pregunta->enunciado;
                $ul = $ul . "<li draggable=\"true\"  ondragstart=\"drag(event)\" id=\"p$idPreg\">$enuncia</li>";
            }
            $ul=$ul."</ul>";
            echo $ul;
        }

        DB::disconnect();

    }catch (PDOException $e) {
        print "¡ERROR!: ". $e->getMessage() . "<br/>";
        die();
    }
}

//LISTADOS
function pintaListaExamenes($a){
    $table="";
    try{
        DB::connect();

        $examenes = DB::obtieneExamenes();
        if($a){
            $table="<table class=\"tableListadoExamenes\"><tr><th>ID</th><th>Descripción</th><th>Duración</th></tr>";
            foreach ($examenes as $examen){
                if($examen->activo>0){
                    $id = $examen->idExamen;
                    $descrip = $examen->descripcion;
                    $durac = $examen->duracion;
                    $table = $table . "<tr>";
                    $table = $table . "<td><a href=\"hacerExamen.php?idExamen=$id\">$id</a></td>";
                    $table = $table . "<td><a href=\"hacerExamen.php?idExamen=$id\">$descrip</a></td>";
                    $table = $table . "<td>$durac</td>";
                    $table = $table . "</tr>";
                    //pintar aqui acciones
                }
            }
            $table=$table."</table>";
            echo $table;
        }

        DB::disconnect();

    }catch (PDOException $e) {
        print "¡ERROR!: ". $e->getMessage() . "<br/>";
        die();
    }
}

//EXAMEN
/*function pintaExamen($a, $idExamen){
    $examen="";
    try{
        DB::connect();

        $preguntas = DB::obtienePreguntasDeExamen($idExamen);
        if($a){
            $table="<table><tr><th>ID</th><th>Descripción</th><th>Duración</th></tr>";
            foreach ($preguntas as $pregunta){
                $id = $pregunta->idPregunta;
                $enunciado = $pregunta->enunciado;
                $recurso = $pregunta->recurso;
                $table = $table . "<tr>";
                $table = $table . "<td><a href=\"hacerExamen.php?idExamen=$id\">$id</a></td>";
                $table = $table . "<td><a href=\"hacerExamen.php?idExamen=$id\">$descrip</a></td>";
                $table = $table . "<td>$durac</td>";
                $table = $table . "</tr>";
                //pintar aqui acciones
            }
            $table=$table."</table>";
            echo $table;
        }

        DB::disconnect();

    }catch (PDOException $e) {
        print "¡ERROR!: ". $e->getMessage() . "<br/>";
        die();
    }
}*/