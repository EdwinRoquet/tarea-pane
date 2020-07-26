<?php

class InformacionControlador {

  
  //Metedo para registrar usuarios
 static public function ctrRegistroInfo(){

    

    if(isset($_POST["titulo"])){


        // echo $_FILES["imagen"];
     

        $table = "info";
        
        $ruta = "";

      if(isset($_FILES["imagen"]["tmp_name"])){
      
          list($ancho, $alto) = getimagesize($_FILES["imagen"]["tmp_name"]);
      
          $nuevoAncho = 500;
          $nuevoAlto = 500;
      
          /*=============================================
          CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
          =============================================*/
      
          $directorio = "views/img/informacion/".$_POST["titulo"];
      
          mkdir($directorio, 0755);
      
          /*=============================================
          DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
          =============================================*/

         if($_FILES["imagen"]["type"] == "image/jpeg"){
     
             /*=============================================
             GUARDAMOS LA IMAGEN EN EL DIRECTORIO
             =============================================*/
     
             $aleatorio = mt_rand(100,999);
     
             $ruta = "views/img/informacion/".$_POST["titulo"]."/".$aleatorio.".jpg";
     
             $origen = imagecreatefromjpeg($_FILES["imagen"]["tmp_name"]);						
     
             $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
     
             imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
     
             imagejpeg($destino, $ruta);
     
         }
     
         if($_FILES["imagen"]["type"] == "image/png"){
     
             /*=============================================
             GUARDAMOS LA IMAGEN EN EL DIRECTORIO
             =============================================*/
     
             $aleatorio = mt_rand(100,999);
     
             $ruta = "views/img/informacion/".$_POST["titulo"]."/".$aleatorio.".png";
     
             $origen = imagecreatefrompng($_FILES["imagen"]["tmp_name"]);						
     
             $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
     
             imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
     
             imagepng($destino, $ruta);
     
         }
     
     }
     

        $data = array(
            "titulo" => $_POST["titulo"],
            "texto" => $_POST["parrafo"],
            "imagen" => $ruta,
            "rol" => $_POST["rol"],
        );

        $resultado = ModeloInformacion::mdlRegistro($table, $data);

        return $resultado;

    }

}

// mostrar

static public function ctrMostarRegistroInfo( $item, $value){

    $table = "info";
    $result = ModeloInformacion::mdlMostrarRegistroInfo($table, $item, $value);
    return $result;
    
}
// mostrar por rol

static public function ctrMostarRegistroCat( $item, $value){

    $table = "info";
    $result = ModeloInformacion::mdlMostrarCatRegistro($table, $item, $value);
    return $result;
    
}

static public function ctrActualizarRegistro(){

    if (isset($_POST["titulo"])) {
      

      $ruta = $_POST["imagenActual"];
      $table = "info";
     
     

      if(isset($_FILES["imagen"]["tmp_name"]) && !empty($_FILES["imagen"]["tmp_name"])){

     list($ancho, $alto) = getimagesize($_FILES["imagen"]["tmp_name"]);

     $nuevoAncho = 500;
     $nuevoAlto = 500;

     /*=============================================
     CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
     =============================================*/

     $directorio = "views/img/informacion/".$_POST["titulo"];

     /*=============================================
     PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
     =============================================*/

     if(!empty($_POST["imagenActual"])){

       unlink($_POST["imagenActual"]);

     }else{

       mkdir($directorio, 0755);	
     
     }
     
     /*=============================================
     DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
     =============================================*/

     if($_FILES["imagen"]["type"] == "image/jpeg"){

       /*=============================================
       GUARDAMOS LA IMAGEN EN EL DIRECTORIO
       =============================================*/

       $aleatorio = mt_rand(100,999);

       $ruta = "views/img/informacion/".$_POST["titulo"]."/".$aleatorio.".jpg";

       $origen = imagecreatefromjpeg($_FILES["imagen"]["tmp_name"]);						

       $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

       imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

       imagejpeg($destino, $ruta);

     }

     if($_FILES["imagen"]["type"] == "image/png"){

       /*=============================================
       GUARDAMOS LA IMAGEN EN EL DIRECTORIO
       =============================================*/

       $aleatorio = mt_rand(100,999);

       $ruta = "views/img/informacion/".$_POST["titulo"]."/".$aleatorio.".png";

       $origen = imagecreatefrompng($_FILES["imagen"]["tmp_name"]);						

       $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

       imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

       imagepng($destino, $ruta);

     }

   }

   $data = array(
    "id" => $_POST["id"],
    "titulo" => $_POST["titulo"],
    "texto" => $_POST["parrafo"],
    "imagen" => $ruta,
    "rol" => $_POST["rol"],
   );
   
   $resultado = ModeloInformacion::mdlEditarRegistro($table, $data);
   
   return $resultado;
   


    }
    
}


// Eliminar

public function ctrEliminarRegistro(){
  
  if(isset($_POST["id_info"])){

    $table = "info";

    $value =  $_POST["id_info"];

    $resultado = ModeloInformacion::mdlEliminarRegistro($table, $value);

    if ($resultado == "ok") {
      echo ' <div class="alert alert-success">Se ha eliminado correctamnete </div>';

      echo "<script> 
      const alert =  document.querySelector('.alert');

      if(alert){
        setTimeout(() => {
          alert.remove();
          window.location = 'index.php?page=informacion';
        }, 1000);
      }
      </script>";

    }

  }


}


}



