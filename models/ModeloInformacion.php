<?php
require_once "conexion.php";

class ModeloInformacion {

    
  static public function mdlRegistro($table, $data) {
    #Statment/ declaracion    

    $stmt = Connection::connect()->prepare("INSERT INTO $table( titulo, texto, imagen, rol ) VALUES ( :titulo, :texto, :imagen, :rol )");

    Connection::connect()->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);

    $stmt->bindParam(":titulo",$data["titulo"],PDO::PARAM_STR);
    $stmt->bindParam(":texto",$data["texto"],PDO::PARAM_STR);
    $stmt->bindParam(":imagen",$data["imagen"],PDO::PARAM_STR);
    $stmt->bindParam(":rol",$data["rol"],PDO::PARAM_STR);

    if ($stmt->execute()) {
      return "ok";
    }else{
      var_dump( Connection::connect()->errorInfo()); 
      // $error = Connection::connect()->errorInfo(); 
      // die ("Error: (".$error[0].':'.$error[1].') '.$error[2]);
    }


    // $stmt->closeCursor();
    // $stmt-> NULL;

   }


   static public function mdlMostrarRegistroInfo($table ,$item, $value){
    if($item != null){

			$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Connection::connect()->prepare("SELECT * FROM $table ORDER by id DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
  

  }


   static public function mdlMostrarCatRegistro($table ,$item, $value){
  
  $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item ORDER by id DESC ");
  
  $stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);
	$stmt -> execute();

	return $stmt -> fetchAll();

  }


   // editar

static public function mdlEditarRegistro($table, $data){

  $stmt = Connection::connect()->prepare("UPDATE $table SET titulo  = :titulo, texto = :texto, imagen = :imagen, rol = :rol WHERE id = :id");
  $stmt->bindParam(":id",$data["id"],PDO::PARAM_STR);
  $stmt->bindParam(":titulo",$data["titulo"],PDO::PARAM_STR);
  $stmt->bindParam(":texto",$data["texto"],PDO::PARAM_STR);
  $stmt->bindParam(":imagen",$data["imagen"],PDO::PARAM_STR);
  $stmt->bindParam(":rol",$data["rol"],PDO::PARAM_STR);

  if($stmt->execute()){

    return "ok";

  }else{

    return "error";
  
  }

  // $stmt->close();
  // $stmt = null;

}







  

   static public function mdlEliminarRegistro($table, $data){

    $stmt = Connection::connect()->prepare("DELETE FROM $table WHERE id = :id ");

    $stmt->bindParam(":id", $data,PDO::PARAM_INT);

    if ($stmt->execute()) {
      return "ok";
    }else{
      print_r(Connection::connect()->errorCode());  
    }


    $stmt->closeCursor();
    // $stmt-> null;
   }


}