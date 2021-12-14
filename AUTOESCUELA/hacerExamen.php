<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Examen</title>
        <link rel="stylesheet" href="./sass/style.css">
        <script src="include/Pintor.js"></script>
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

            <div id="containerAltaPregunta">
                <div class="divForm">
                    <h2>Pregunta 1</h2>
                    <p>Enunciado</p>
                    <div>
                        <label for="preg1respuesta1">Respuesta 1</label>
                        <input class="inputRespuestaRadio" type="radio" name="preg1" value="preg1respuesta1">
                    </div>
                    <div>
                        <label for="preg1respuesta2">Respuesta 2</label>
                        <input class="inputRespuestaRadio" type="radio" name="preg1" value="preg1respuesta2">
                    </div>
                    <div>
                        <label for="preg1respuesta3">Respuesta 3</label>
                        <input class="inputRespuestaRadio" type="radio" name="preg1" value="preg1respuesta3">
                    </div>
                    <div>
                        <label for="preg1respuesta3">Respuesta 4</label>
                        <input class="inputRespuestaRadio" type="radio" name="preg1" value="preg1respuesta4">
                    </div>
                </div>
                <div class="divForm">
                    <?php
                        //require_once './include/Pintor.php';
                        //pintaExamen(true);

                    ?>
                </div>
            </div>

            <div id="divForm">
                <button id="btnAtras">Atrás</button>
                <button id="btnSiguiente">Siguiente</button>
                <button id="btnFinalizar">Finalizar</button>
            </div>

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

        </div>
    </body>
</html>