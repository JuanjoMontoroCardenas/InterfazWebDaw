<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alta de usuario</title>
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
                        <label for="email">Email</label>
                        <input type="text" name="email" maxlength="30">
                    </div>
                    <div class="divForm">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" maxlength="30">
                    </div>
                    <div class="divForm">
                        <label for="password2">Repetir contraseña</label>
                        <input type="password" name="password2" maxlength="30">
                    </div>
                    <div class="divForm">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" maxlength="30">
                    </div>
                    <div class="divForm">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" name="apellidos" maxlength="30">
                    </div>
                    <div class="divForm">
                        <label for="rol">Fecha de nacimiento</label>
                        <input type="date" name="fechanac">
                    </div>
                    <div class="divForm">
                        <label for="foto">Foto de perfil</label>
                        <input type="file" name="foto">
                    </div>
                    <div class="divForm">
                        <label for="fechanac">Rol</label>
                        <select name="rol" id="rol">
                            <option value="alumno">Alumno</option>
                            <option value="profesor">Profesor</option>
                        </select>
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
                    require_once './entities/Usuario.php';
                    require_once './include/GBD.php';
                    require_once './include/Session.php';
                    require_once './include/Login.php';
 
                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                        if(!empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["password2"]) && !empty($_POST["nombre"]) && !empty($_POST["apellidos"]) && !empty($_POST["fechanac"]) && !empty($_POST["rol"]) && !empty($_POST["foto"]) ){
                            if($_POST["password"] == $_POST["password2"]){
                                    try{
                                        DB::connect();
        
                                        $fotoPerfil = base64_encode($_POST["foto"]);
                                        $arrayParaUsuario = Usuario::arrayParaConstructor( null, $_POST["email"], $_POST["nombre"], $_POST["apellidos"], $_POST["password"], $_POST["fechanac"], $_POST["rol"], $fotoPerfil, 1);
                                        $u = new Usuario($arrayParaUsuario);
        
                                        DB::altaUsuario($u);
                                        DB::disconnect();
        
                                    } catch (PDOException $e) {
                                        print "¡ERROR!: ". $e->getMessage() . "<br/>";
                                        die();
                                    }

                            } else {
                                print("Debes de introducir dos veces la misma contraseña");

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