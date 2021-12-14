<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alta de examen</title>
        <link rel="stylesheet" href="./sass/style.css">
        <script src="include/dragExamen.js"></script>
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
                        <li>
                            <a href="listadoUsuarios.php">Usuarios</a>
                            <ul>
                                <li>
                                    <a href="altaUsuario.php">Alta de usuario</a>
                                </li>
                                <li>
                                    <a href="altaUsuario.php">Alta masiva</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="listadoTematicas.php">Temáticas</a>
                            <ul>
                                <li>
                                    <a href="altaTematica.php">Alta de temática</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="listadoPreguntas.php">Preguntas</a>
                            <ul>
                                <li>
                                    <a href="altaPregunta.php">Alta de pregunta</a>
                                </li>
                                <li>
                                    <a href="altaPregunta.php">Alta masiva</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="listadoExamenes.php">Exámenes</a>
                            <ul>
                                <li>
                                    <a href="altaExamen.php">Alta de examen</a>
                                </li>
                                <li>
                                    <a href="listadoExamenes.php">Histórico</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>

                <div class="titleHeader">
                    <h1>Alta de examen</h1>
                </div>
            </header>

            <script>
                function allowDrop(ev) {
                    ev.preventDefault();
                }

                function drag(ev) {
                    ev
                        .dataTransfer
                        .setData("text", ev.target.id);
                }

                function drop(ev) {
                    ev.preventDefault();
                    var data = ev
                        .dataTransfer
                        .getData("text");
                    ev
                        .target
                        .appendChild(document.getElementById(data));
                }
            </script>

            <div id="containerAltaExamen">
                <form class="formAlta" method="POST" action="#">
                    <div class="divForm">
                        <label for="descripcion">Descripción</label>
                        <input name="descripcion" id="descripcion" maxlength="200">
                    </div>
                    <div class="divForm">
                        <label for="duracion">Duración</label>
                        <input name="duracion" id="duracion">
                        <!-- validar numero parseint == value !-->
                    </div>
                    <div class="divFormExamen">
                        <label for="pregPosibles">Preguntas posibles</label>
                        <?php
                            require_once './include/Pintor.php';
                            pintaUlPregPosibles(true);

                        ?>
                    </div>
                    <div class="divFormExamen">
                        <label for="pregSeleccionadas">Preguntas seleccionadas</label>
                        <ul
                            class="pregSelec"
                            id="seleccionadas"
                            ondrop="drop(event)"
                            ondragover="allowDrop(event)"></ul>
                    </div>
                    <div class="divFormButton divForm">
                        <button id="guardar">Guardar</button>
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

                <script>
                    window.addEventListener('load', function () {
                        const descripcion = this
                            .document
                            .getElementById("descripcion");
                        const duracion = this
                            .document
                            .getElementById("duracion");
                        const enviar = this
                            .document
                            .getElementById("guardar");
                        enviar.onclick = function (ev) {
                            ev.preventDefault();
                            var selec = document.querySelectorAll("ul#seleccionadas>li");
                            var ids = [];
                            for (let i = 0; i < selec.length; i++) {
                                ids.push(selec[i].id.substr(1));
                            }
                            if (descripcion.value != "" && duracion.value != "") {
                                if (ids.length = 15) {
                                    var examen = {
                                        eDescripcion: descripcion.value,
                                        eDuracion: duracion.value,
                                        ePreguntas: ids
                                    };
                                    var jsonExamen = JSON.stringify(examen);

                                    const ajax = new XMLHttpRequest();
                                    ajax.onreadystatechange = function () {
                                        if (ajax.readyState == 4 && ajax.status == 200) {
                                            var respuesta = ajax.responseText;
                                            if (respuesta.value == "OK") {
                                                mensaje.value = "";
                                                mensaje.focus();
                                            }
                                        }
                                    }
                                    ajax.open("POST", "altaExamenEnviado.php");
                                    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                    ajax.send(examen);
                                } else {
                                    alert("Debes de seleccionar 15 preguntas.");
                                }
                            } else {
                                alert("Debes de rellenar todos los campos.");
                            }
                        }
                    })
                </script>
            </div>

        </div>
    </body>
</html>