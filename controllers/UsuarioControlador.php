<?php

class UsuarioControlador {

  
  //Metedo para registrar usuarios
 static  public function ctrRegistro(){

    if(isset($_POST["nombre"])){

        $table = "usuarios";
        //Convertir numero a string
        $edad = strval($_POST['edad']);
        //Encriptar contraseña
		$opciones = [
			'cost' => 12,
		];
    $encriptar  =	password_hash($_POST['contrasena'], PASSWORD_BCRYPT, $opciones);
    
    $info = (isset($_POST['info']) == '') ? false : true;
    $usuario = (isset($_POST['rol']) == '') ? 'usuario' : 'administrador';
        
        

        $data = array(
            'nombre' => $_POST['nombre'],
            'edad' => $edad,
            'rol' => $usuario,
            'correo' => $_POST['correo'],
            'contrasena' => $encriptar ,
            'info' => $info,
        );
        $resultado = ModeloUsuario::mdlRegistro($table, $data);
        return $resultado;
    }

}

//mostrar

static public function ctrMostarRegistro( $item, $value){

    $table = "usuarios";
    $result = ModeloUsuario::mdlMostrarRegistro($table, $item, $value);
    return $result;
    
}

public function ctrLogin(){
    if (isset($_POST['correo'])) {
        
        $table = "usuarios";
        $item  = "correo";
        $value = $_POST['correo'];

    
     $resultado = ModeloUsuario::mdlMostrarRegistro($table, $item, $value);
     
     if ($resultado['correo'] == $_POST['correo'] && password_verify($_POST['contrasena'], $resultado['contrasena']) ) {
        
       $_SESSION['validarIngreso'] = 'ok';
       $_SESSION['nomre'] = $resultado['nombre'];
       $_SESSION['edad'] = $resultado['edad'];
       $_SESSION['correo'] = $resultado['correo'];
       $_SESSION['info'] = $resultado['info'];
       $_SESSION['rol'] = $resultado['rol'];

       echo ' <div class="alert alert-success">Ingreso exitoso </div>';

        echo "<script> 
        const alert =  document.querySelector('.alert');
  
        if(alert){
          setTimeout(() => {
            alert.remove();
            window.history.replaceState( null, null, window.location.href );
            window.location = 'index.php?page=inicio';
          }, 1000);
        }
        </script>";
         
     } else {
        echo ' <div class="alert alert-danger">Error en la contraseña o correo </div>';

        echo "<script> 
        const alert =  document.querySelector('.alert');
  
        if(alert){
          setTimeout(() => {
            alert.remove();
            window.history.replaceState( null, null, window.location.href );
          }, 3000);
        }
        </script>";
  
     }
     
    }
}
  

//Eliminar

public function ctrEliminarRegistro(){
  
  if(isset($_POST["id_usuario"])){

    $table = "usuarios";

    $value =  $_POST["id_usuario"];

    $result = ModeloUsuario::mdlEliminarRegistro($table, $value);

    if ($result == "ok") {
      echo ' <div class="alert alert-success">Se ha eliminado correctamnete </div>';

      echo "<script> 
      const alert =  document.querySelector('.alert');

      if(alert){
        setTimeout(() => {
          alert.remove();
          window.location = 'index.php?page=usuario';
        }, 1000);
      }
      </script>";

    }

  }


}


}