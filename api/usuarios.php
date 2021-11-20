<?php
    // echo $_SERVER["REQUEST_METHOD"];
    // NOS DEVULVE EL METODO POR EL QUE SE ESTA PIDIENDO LA PAGINA
    
    header("Content-Type: application/json");
    // echo 'Informacion '.file_get_contents('php://input'); //ESTO NOS PERMITE VER LA INFORMACION QUE ESTA MANDANDO EL USUARIO
    switch ($_SERVER["REQUEST_METHOD"]) {
        case 'POST':
            $_POST = json_decode(file_get_contents('php://input'),true);
            // POST TENDRIA QUE SER UN ARREGLO ASOCIATIVO, ENTONCES TENEMOS QUE DESENCODE EL JSON Y PASARLE TRUE PARA QUE SEA ASOCIATIVO
            // POR QUE FILE GET CONTENTS NOS DEVUELVE UN JSON
            // ENTONCES LO ESTAMOS GUARDANDO EN UN ARREGLO ASOCIATIVO QUE SE LLAMA $_POST
            $resultado["mensaje"] = "Guardar usuario ".json_encode($_POST);
            echo json_encode($resultado);
            
        break;
        case 'GET':
            if (isset($_GET['id'])) {
                $resultado["mensaje"] = "Obtener usuario ".$_GET["id"];
                echo json_encode($resultado);
            }
            else{
                $resultado["mensaje"] = "Retornar todos los usuarios";
                echo json_encode($resultado);
            }
        break;
        case 'PUT':
            $_PUT = json_decode(file_get_contents('php://input'),true);
            $resultado["mensaje"] = "Altualizar usuario con el id ".$_GET['id'].
                                    " Informacion a actualizar: ". json_encode($_PUT);
            echo json_encode($resultado);
        break;
        case 'DELETE':
            $resultado["mensaje"] = "Eliminar usuario = ".$_GET['id'];
            echo json_encode($resultado);
        break;
    }
?>