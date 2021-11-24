var usuarios = [];
function obtenerUsuarios(){
    axios({
        method:'GET',
        url:'../api/usuarios.php',
        responseType:'json'
    }).then(res=>{
        // console.log(res.data);
        this.usuarios = res.data;
        // console.log(this.usuarios);
        llenarTabla();
    }).catch(error=>{
        console.error(error);
    });
}

obtenerUsuarios();

function guardarUsuario(){
    console.log(document.getElementById('id_pais').value);
    let usuario = {
        "nombre":document.getElementById('id_nombre').value,
        "apellido":document.getElementById('id_apellido').value,
        "fechaNacimiento":document.getElementById('id_fecha_nac').value,
        "pais":document.getElementById('id_pais').value
    }
    axios({
        method:'POST',
        url:'../api/usuarios.php',
        responseType:'json',
        data:usuario
    }).then(res=>{
        console.log(res.data);
        // this.usuarios = res.data;
        // console.log(this.usuarios);
        obtenerUsuarios();
    }).catch(error=>{
        console.error(error);
    });
}

function llenarTabla(){
    document.querySelector('#tablaInfo tbody').innerHTML = "";
    usuarios.forEach((item, i) => {
        document.querySelector('#tablaInfo tbody').innerHTML +=
            `<tr>
                <td>${item.nombre}</td>
                <td>${item.apellido}</td>
                <td>${item.fechaNacimiento}</td>
                <td>${item.pais}</td>
                <td><button type="button" onclick="eliminarUsuer(${i})">Eliminar</button></td>
                <td><button type="button" onclick="habilitarActualizarUsuario(${i})">Update</button></td>
            </tr>`;
    });
}


 function eliminarUsuer(item){
    axios({
        method:'DELETE',
        url: `../api/usuarios.php?id=${item}`
        // responseType:'json'
    }).then(res=>{
        console.log(res.data);
        // this.usuarios = res.data;
        // console.log(this.usuarios);
        obtenerUsuarios();
    }).catch(error=>{
        console.error(error);
    });
 }

function habilitarActualizarUsuario(item){
    let actuButton = document.getElementById('actualizarButton');
    actuButton.hidden = false;
    actuButton.value = item;
    // console.log(actuButton.value);
    axios({
        method:'GET',
        url:`../api/usuarios.php?id=${item}`,
        responseType:'json'
    }).then(res=>{
        // console.log(res.data);
        this.usuarios = res.data;
        // console.log(this.usuarios.nombre);
        document.getElementById('id_nombre').value = res.data.nombre;
        document.getElementById('id_apellido').value = res.data.apellido;
        document.getElementById('id_fecha_nac').value = res.data.fechaNacimiento;
        document.getElementById('id_pais').value = res.data.pais;
        // llenarTabla();
    }).catch(error=>{
        console.error(error);
    });
}

function actualizarUsuario(){
    let usuario = {
        "nombre":document.getElementById('id_nombre').value,
        "apellido":document.getElementById('id_apellido').value,
        "fechaNacimiento":document.getElementById('id_fecha_nac').value,
        "pais":document.getElementById('id_pais').value
    }
    axios({
        method:'PUT',
        url:`../api/usuarios.php?id=${document.getElementById('actualizarButton').value}`,
        responseType:'json',
        data:usuario
    }).then(res=>{
        console.log(res.data);
        // this.usuarios = res.data;
        // console.log(this.usuarios);
        obtenerUsuarios();
    }).catch(error=>{
        console.error(error);
    });
}
