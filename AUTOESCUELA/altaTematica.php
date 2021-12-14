<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alta de temática</title>
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

            <div id="containerAlta">
                <form class="formAlta" method="POST" action="#">
                    <div class="divForm">
                        <label for="descripcion">Descripción</label>
                        <input type="text" name="descripcion" maxlength="30">
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
                    require_once './entities/Tematica.php';
                    require_once './include/GBD.php';
                    require_once './include/Session.php';
                    require_once './include/Login.php';
 
                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                        if( !empty($_POST["descripcion"]) ){
                            try{
                                DB::connect();

                                $arrayParaTematica = Tematica::arrayParaConstructor( "none", $_POST["descripcion"]);
                                $t = new Tematica($arrayParaTematica);

                                DB::altaTematica($t);
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

        </div>
    </body>
</html>