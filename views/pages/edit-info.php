
<?php
  
  $info = InformacionControlador::ctrMostarRegistroInfo('id', $_GET['id']);


?>  

<h3 class="text-center">Editar Información</h1>

<?php
  $edinfo = InformacionControlador::ctrActualizarRegistro();

  if ($edinfo == "ok") {
    // echo $info;
  echo ' <div class="alert alert-success">Se ha actualizado correctamente </div>';
  
  echo "<script> 
  const alert =  document.querySelector('.alert');
  
  if(alert){
   setTimeout(() => {
     alert.remove();
     window.location = 'index.php?page=informacion';
    
   }, 3000);
  }
  </script>";
  
  }
?>

  <form class="p-5  col-md-12" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="titulo">Titulo: </label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i>
          </span>
        </div>
        <input type="text" name="titulo" id="titulo" class="form-control" required value="<?php echo $info["titulo"];?>">
      </div>
    </div>

    <div class="form-group">
      <label for="parrafo">Parrafo: </label>
      <div class="input-group">
       
        <textarea id="parrafo" name="parrafo" class="form-control" rows="8" cols="50">
        <?php echo $info["texto"];?>
      </textarea>
      </div>
    </div>

    
    <div class="form-group">
              
              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="imagen" name="imagen">

              <!-- <p class="help-block">Peso máximo de la foto 2MB</p> -->

              <img src="<?php echo $info["imagen"];?>" class="img-thumbnail previsualizar" width="100px">
              <input type="hidden" name="imagenActual" value="<?php echo $info["imagen"];?>">
              <input type="hidden" name="id" value="<?php echo $info["id"];?>">

      </div>
    

   
    <div class="form-group">
      <label for="rol">¿Quien lo puede ver?
      </label>
      <div class="input-group">
        <div class="input-group-prepend">
        <span class="input-group-text"> <i class="fa fa-lock"></i></span>
        </div>      
        <select class="form-control input-lg" name="rol">
           <option value=""> Seleccionar categoría</option>
           <option value="mayor">Mayor</option>
           <option value="menor">Menor</option>
           <option value="<?php echo $info["rol"];?>" selected><?php echo $info["rol"]  == 'menor'  ? 'Menor' : 'Mayor' ?></option>
        </select>
      </div>
    </div>
  
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

