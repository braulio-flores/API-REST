<?php
    // echo $_SERVER["REQUEST_METHOD"];
    // NOS DEVULVE EL METODO POR EL QUE SE ESTA PIDIENDO LA PAGINA
    
    header("Content-Type: application/json"); //PARA INDICAR QUE VAMOS A DEVOLVER JSON
    // echo 'Informacion '.file_get_contents('php://input'); //ESTO NOS PERMITE VER LA INFORMACION QUE ESTA MANDANDO EL USUARIO
    include_once "../clases/class-usuarios.php";
    switch ($_SERVER["REQUEST_METHOD"]) {
        case 'POST':
            $_POST = json_decode(file_get_contents('php://input'),true);
            // POST TENDRIA QUE SER UN ARREGLO ASOCIATIVO, ENTONCES TENEMOS QUE DESENCODE EL JSON Y PASARLE TRUE PARA QUE SEA ASOCIATIVO
            // POR QUE FILE GET CONTENTS NOS DEVUELVE UN JSON
            // ENTONCES LO ESTAMOS GUARDANDO EN UN ARREGLO ASOCIATIVO QUE SE LLAMA $_POST
            $usuarioP = new Usuario($_POST["nombre"],$_POST["apellido"],$_POST["fechaNacimiento"],$_POST["pais"]);
            echo $usuarioP->toString();
            $usuarioP->guardarUsuario();
            $resultado["mensaje"] = "Usuario Guardado ".json_encode($_POST);
            echo json_encode($resultado);
            
        break;
        case 'GET':
            if (isset($_GET['id'])) {
                // $resultado["mensaje"] = "Obtener usuario ".$_GET["id"];
                // echo json_encode($resultado);
                // echo "--------";
                echo Usuario::obtenerUsuario($_GET['id']);
            }
            else{
                // $resultado["mensaje"] = "Retornar todos los usuarios";
                // echo json_encode($resultado);
                // echo "----";
                echo Usuario::obtenerUsuarios();
            }
        break;
        case 'PUT':
            $_PUT = json_decode(file_get_contents('php://input'),true);
            $resultado["mensaje"] = "Altualizar usuario con el id ".$_GET['id'].
                                    " Informacion a actualizar: ". json_encode($_PUT);
            echo json_encode($resultado);
            echo "-------------";
            Usuario::actualizarUsuario($_GET['id'],$_PUT["nombre"],$_PUT["apellido"],$_PUT["fechaNacimiento"],$_PUT["pais"]);
        break;
        case 'DELETE':
            $resultado["mensaje"] = "Eliminar usuario = ".$_GET['id'];
            echo json_encode($resultado);
            Usuario::eliminarUsuario($_GET['id']);
        break;
    }
?>