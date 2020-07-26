<?php 

require_once "../controllers/UsuarioControlador.php";
require_once "../models/ModeloUsuario.php";

class AjaxUsuarios{

    // Editar Usuario
    

    // public function ajaxEditarUsuario(){
      
    //     $item = "id";
    //     $valor = $this->idUsuario;
        
    //     $respuesta = ControladorUsuarios::ctrMostrarUsuario($item, $valor);

    //     echo json_encode($respuesta);



    // }



    // Validar para no repetir usuario

    public $validarUsuario;

    public function ajaxValidarUsuario(){
        # code...
        $item = "correo";
        $value = $this->validarUsuario;
        
        $respuesta = UsuarioControlador::ctrMostarRegistro($item, $value);

        echo json_encode($respuesta);
    }




}

// Editar Usuario

// if(isset($_POST["idUsuario"])){
//     $editar = new AjaxUsuarios();
//     $editar -> idUsuario = $_POST["idUsuario"];
//     $editar->ajaxEditarUsuario();
// }


// Validar usuario

if (isset($_POST["validarUsuario"])) {
    
    $valUsuario = new AjaxUsuarios();
    $valUsuario -> validarUsuario = $_POST["validarUsuario"];
    $valUsuario -> ajaxValidarUsuario();
}