<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <LINK rel="StyleSheet" href="../css/style.css" TYPE="text/css" MEDIA="screen">
    <title>Consumir API REST AJAX</title>
</head>
<body>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="../js/controlador.js"></script>
    <h1>Consumir API REST CON AJAX</h1>
    <div class="form">
        <label for="id_nombre">Nombre:</label>
        <input type="text" id="id_nombre" name="nombre" placeholder="nombre"><br><br>
        <label for="id_apellido">Apellido:</label>
        <input type="text" id="id_apellido" name="apellido" placeholder="apellido"><br><br>
        <label for="id_fecha_nac">Fecha de Nacimiento:</label>
        <input type="date" id="id_fecha_nac" name="fechaNacimiento" placeholder="Fecha de Nacimiento"><br><br>
        <label for="id_pais">Pais:</label>
        <select name="select_pais" id="id_pais">
            <option value="null" disabled selected>selecciona tu pais</option>
            <option value="mexico">Mexico</option>
            <option value="EUA">EUA</option>
        </select>
        <br><br>
        <button onclick="guardarUsuario()">Añadir</button>
        <button id="actualizarButton" onclick="actualizarUsuario()" hidden>Actualizar</button>
    </div>
    <table id="tablaInfo">
        <thead>
            <tr>
                <td>Nombre</td>
                <td>Apellido</td>
                <td>Fecha de Nacimiento</td>
                <td>Pais</td>
                <td></td>
                <td></td>
            </tr>
        </thead>
        <tbody>            
        </tbody>
    </table>
    
</body>
</html>