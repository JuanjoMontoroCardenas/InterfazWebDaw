<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="sass/style.css">
        <script src="js/code.js"></script>
    </head>
    <body>
        <div id="container">
            <div class="divLogoLogin">
                <img src="./multimedia/img/logo.png" alt="logo">
            </div>
            <form method="POST" action="#">
                <div class="divForm">
                    <label for="email">Email</label>
                    <input type="text" name="email">
                </div>
                <div class="divForm">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password">
                </div>
                <div class="divLoginRecuerdame">
                    <label for="recuerdame">Recuérdame</label>
                    <input class="inputCheckbox" type="checkbox" name="recuerdame" value="yes">
                </div>
                <div class="divFormButton divForm">
                    <button>Aceptar</button>
                </div>
                <div class="divLinksLogin">
                    <a href="#">¿Has olvidado tu contraseña?</a>
                    <a href="#">Nueva cuenta de usuario</a>
                </div>
            </form>

            <?php
                require_once './entities/Usuario.php';
                require_once './include/GBD.php';
                require_once './include/Session.php';
                require_once './include/Login.php';

                if($_SERVER["REQUEST_METHOD"] == "POST"){

                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    if(isset($_POST['recuerdame'])){
                        $recuerdame = true;
                    } else {
                        $recuerdame = false;
                    }

                    if(empty($email) || empty($password) ){
                        print("Debe de introducir un email y su contraseña.");

                    }else{
                        try{
                            if(Login::Identifica($email, $password, $recuerdame)){
                                if  (Login::UsuarioEstaLogueado()){
                                    Session::write('usuario', DB::obtieneUsuario($usuario,$password));
                                    header("Location: index.php");             
                                }
                            }
                            
                            DB::disconnect();

                        } catch (PDOException $e) {
                            print "¡ERROR!: ". $e->getMessage() . "<br/>";
                            die();
                        }
                    }
                }
            ?>

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