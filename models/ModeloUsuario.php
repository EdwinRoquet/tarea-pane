<?php
require_once "conexion.php";

class ModeloUsuario {

    // registry

   static public function mdlRegistro($table, $data) {
    #Statment/ declaracion    

    $stmt = Connection::connect()->prepare("INSERT INTO $table (nombre,edad,rol ,correo, contrasena, info) VALUES (:nombre,:edad,:rol, :correo, :contrasena, :info)");

    $stmt->bindParam(":nombre",  $data["nombre"],PDO::PARAM_STR);
    $stmt->bindParam(":edad",   $data["edad"],PDO::PARAM_STR);
    $stmt->bindParam(":rol",   $data["rol"],PDO::PARAM_STR);
    $stmt->bindParam(":correo",   $data["correo"],PDO::PARAM_STR);
    $stmt->bindParam(":contrasena",$data["contrasena"],PDO::PARAM_STR);
    $stmt->bindParam(":info",$data["info"],PDO::PARAM_BOOL);

    if ($stmt->execute()) {
      return "ok";
    }else{
      print_r(Connection::connect()->errorCode());  
    }


    $stmt->closeCursor();
    $stmt-> NULL;

   }


   static public function mdlMostrarRegistro($table ,$item, $value){
    if($item != null){

			$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Connection::connect()->prepare("SELECT * FROM $table");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
  
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