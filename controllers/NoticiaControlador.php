<?php

class NoticiaControlador {

  
  //Metedo para registrar usuarios
 static public function ctrRegistroNoticia(){

    

    if(isset($_POST["titulo"])){


        // echo $_FILES["imagen"];
     

        $table = "noticia";
        
        $ruta = "";

      if(isset($_FILES["imagen"]["tmp_name"])){
      
          list($ancho, $alto) = getimagesize($_FILES["imagen"]["tmp_name"]);
      
          $nuevoAncho = 500;
          $nuevoAlto = 500;
      
          /*=============================================
          CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
          =============================================*/
      
          $directorio = "views/img/noticias/".$_POST["titulo"];
      
          mkdir($directorio, 0755);
      
          /*=============================================
          DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
          =============================================*/

         if($_FILES["imagen"]["type"] == "image/jpeg"){
     
             /*=============================================
             GUARDAMOS LA IMAGEN EN EL DIRECTORIO
             =============================================*/
     
             $aleatorio = mt_rand(100,999);
     
             $ruta = "views/img/noticias/".$_POST["titulo"]."/".$aleatorio.".jpg";
     
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
     
             $ruta = "views/img/noticias/".$_POST["titulo"]."/".$aleatorio.".png";
     
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

        $resultado = ModeloNoticia::mdlRegistro($table, $data);

        return $resultado;

    }

}

// mostrar

static public function ctrMostarRegistro( $item, $value){

    $table = "noticia";
    $result = ModeloNoticia::mdlMostrarRegistro($table, $item, $value);
    return $result;
    
}
// mostrar

static public function ctrMostarCatNotRegistro( $item, $value){

    $table = "noticia";
    $result = ModeloNoticia:: mdlMostrarCatNotRegistro($table, $item, $value);
    return $result;
    
}

static public function ctrActualizarRegistro(){

  if (isset($_POST["titulo"])) {
    

    $ruta = $_POST["imagenActual"];
    $table = "noticia";
   
   

    if(isset($_FILES["imagen"]["tmp_name"]) && !empty($_FILES["imagen"]["tmp_name"])){

   list($ancho, $alto) = getimagesize($_FILES["imagen"]["tmp_name"]);

   $nuevoAncho = 500;
   $nuevoAlto = 500;

   /*=============================================
   CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
   =============================================*/

   $directorio = "views/img/noticias/".$_POST["titulo"];

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

     $ruta = "views/img/noticias/".$_POST["titulo"]."/".$aleatorio.".jpg";

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

     $ruta = "views/img/noticias/".$_POST["titulo"]."/".$aleatorio.".png";

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
 
 $resultado = ModeloNoticia::mdlEditarRegistro($table, $data);
 
 return $resultado;
 


  }
  
}




// Eliminar

public function ctrEliminarRegistro(){
  
  if(isset($_POST["id_noticia"])){

    $table = "noticia";

    $value =  $_POST["id_noticia"];

    $resultado = ModeloNoticia::mdlEliminarRegistro($table, $value);

    if ($resultado == "ok") {
      echo ' <div class="alert alert-success">Se ha eliminado correctamnete </div>';

      echo "<script> 
      const alert =  document.querySelector('.alert');

      if(alert){
        setTimeout(() => {
          alert.remove();
          window.location = 'index.php?page=noticia';
        }, 1000);
      }
      </script>";

    }

  }


}


}



