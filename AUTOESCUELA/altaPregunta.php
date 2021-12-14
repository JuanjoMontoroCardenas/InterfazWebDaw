<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alta de Pregunta</title>
        <link rel="stylesheet" href="./sass/style.css">
        <script src="js/code.js"></script>
    </head>
    <body>
        <div id="container">
            <header>
                <div class="logoHeader">
                    <img src="./multimedia/img/logo.png" alt="logo">
                </div>
                <div class="perfilHeader">
                    <img src="./multimedia/img/perfil.png" alt="logo">
                </div>

                <!--MENUNAVEGACION!-->
                <nav id="menu">
                    <ul>
                        <li><a href="listadoUsuarios.php">Usuarios</a>
                            <ul>
                                <li><a href="altaUsuario.php">Alta de usuario</a></li>
                                <li><a href="altaUsuario.php">Alta masiva</a></li>
                            </ul>
                        </li>
                        <li><a href="listadoTematicas.php">Temáticas</a>
                            <ul>
                                <li><a href="altaTematica.php">Alta de temática</a></li>
                            </ul>
                        </li>
                        <li><a href="listadoPreguntas.php">Preguntas</a>
                            <ul>
                                <li><a href="altaPregunta.php">Alta de pregunta</a></li>
                                <li><a href="altaPregunta.php">Alta masiva</a></li>
                            </ul>
                        </li>
                        <li><a href="listadoExamenes.php">Exámenes</a>
                            <ul>
                                <li><a href="altaExamen.php">Alta de examen</a></li>
                                <li><a href="listadoExamenes.php">Histórico</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>

                <div class="titleHeader">
                    <h1>Alta de usuario</h1>
                </div>
            </header>
            
            <form class="formAlta" method="POST" action="#">
                <div class="divForm">
                    <label for="tematica">Temática</label>
                    <?php
                        require_once './include/Pintor.php';
                        pintaSelectTematicas(true);

                    ?>
                </div>
                <div class="divForm">
                    <label for="enunciado">Enunciado</label>
                    <textarea name="enunciado" id="enunciado" rows="10" maxlength="200"></textarea>
                </div>
                <div class="divForm">
                    <label for="recurso">Recurso</label>
                    <input type="file" name="recurso">
                </div>
                <div class="divForm">
                    <div>
                        <label for="respuesta1">Opción 1</label>
                    </div>
                    <div>
                        <input type="text" name="respuesta1" maxlength="200">
                        <input type="radio" name="correcta" value="respuesta1">
                        <label for="radio1">Correcta</label>
                    </div>
                </div>
                <div class="divForm">
                    <div>
                        <label for="respuesta2">Opción 2</label>
                    </div>
                    <div>
                        <input type="text" name="respuesta2" maxlength="200">
                        <input type="radio" name="correcta" value="respuesta2">
                        <label for="radio2">Correcta</label>
                    </div>
                </div>
                <div class="divForm">
                    <div>
                        <label for="respuesta3">Opción 3</label>
                    </div>
                    <div>
                        <input type="text" name="respuesta3" maxlength="200">
                        <input type="radio" name="correcta" value="respuesta3">
                        <label for="radio3">Correcta</label>
                    </div>
                </div>
                <div class="divForm">
                    <div>
                        <label for="respuesta4">Opción 4</label>
                    </div>
                    <div>
                        <input type="text" name="respuesta4" maxlength="200">
                        <input type="radio" name="correcta" value="respuesta4">
                        <label for="radio4">Correcta</label>
                    </div>
                </div>
                <div class="divFormButton divForm">
                    <button>Aceptar</button>
                </div>
            </form>

            <!--FOOTER!-->
            <footer>
                <div class="activaFooter"></div>
                <div class="contieneFooter">
                    <div class="centroContenidoFooter">
                        <h3>Email: autotamaran@gmail.com</h3>
                        <h3>Tlf: 672364020</h3>
                        <h3>Página web desarrollada por Juan José Montoro Cárdenas</h3>
                    </div>
                </div>
            </footer>

            <?php
                    require_once './entities/Pregunta.php';
                    require_once './entities/Respuesta.php';
                    require_once './include/GBD.php';
                    require_once './include/Session.php';
                    require_once './include/Login.php';
 
                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                        if(!empty($_POST["tematica"]) && !empty($_POST["enunciado"]) && !empty($_POST["recurso"]) && !empty($_POST["respuesta1"]) && !empty($_POST["respuesta2"]) && !empty($_POST["respuesta3"]) && !empty($_POST["respuesta4"]) && !empty($_POST["correcta"]) ){
                            //CREO LAS PREGUNTAS CON EL IDRESPUESTA NULL, CREO RESPUESTA CON IDPREGUNTA CORRECTO, Y DESPUES ALTER TABLE PARA ASIGNAR A PREGUNTAS EL IDRESPUESTA QUE ESTABA NULL
                            try{
                                DB::connect();

                                // CREO PREGUNTA
                                $recurso = base64_encode($_POST["recurso"]);

                                $arrayParaPregunta = Pregunta::arrayParaConstructor( null, $_POST["enunciado"], $recurso, 0, $_POST["tematica"]);
                                $p = new Pregunta($arrayParaPregunta);
                                DB::altaPregunta($p);

                                //RECIBO PREGUNTA PARA SABER ID
                                $q = DB::obtienePreguntaPorEnunciado($_POST["enunciado"]);

                                //CREO RESPUESTA 1
                                $arrayParaRespuesta = Respuesta::arrayParaConstructor( null, $_POST["respuesta1"], $q->idPregunta);
                                $r1 = new Respuesta($arrayParaRespuesta);
                                DB::altaRespuesta($r1);

                                //CREO RESPUESTA 2
                                $arrayParaRespuesta = Respuesta::arrayParaConstructor( null, $_POST["respuesta2"], $q->idPregunta);
                                $r2 = new Respuesta($arrayParaRespuesta);
                                DB::altaRespuesta($r2);

                                //CREO RESPUESTA 3
                                $arrayParaRespuesta = Respuesta::arrayParaConstructor( null, $_POST["respuesta3"], $q->idPregunta);
                                $r3 = new Respuesta($arrayParaRespuesta);
                                DB::altaRespuesta($r3);

                                //CREO RESPUESTA 4
                                $arrayParaRespuesta = Respuesta::arrayParaConstructor( null, $_POST["respuesta4"], $q->idPregunta);
                                $r4 = new Respuesta($arrayParaRespuesta);
                                DB::altaRespuesta($r4);

                                // post$correcta contiene el nombre de la variable del enunciado de la respuesta
                                $correcta = $_POST["correcta"];
                                DB::asignaRespuestaCorrecta($_POST["enunciado"], $_POST[$correcta]);
                                
                                DB::disconnect();

                            } catch (PDOException $e) {
                                print "¡ERROR!: ". $e->getMessage() . "<br/>";
                                die();
                            }
                        }else{
                            print("Todos los campos deben de ser rellenados");
                        }
                    }
                ?>

        </div>
    </body>
</html>