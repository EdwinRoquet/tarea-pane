<?php

if (!isset($_SESSION['validarIngreso'])) {
    echo "<script> window.location = 'index.php?page=login';</script>";
    return;
}else{
    if ($_SESSION['rol'] != "administrador"){
        echo "<script> window.location = 'index.php?page=home';</script>";
        return;
    }
}

 
// $user = UsuarioControlador::ctrMostarRegistro(null, null);
$infoMostrar = NoticiaControlador::ctrMostarRegistro(null, null);



?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary m-3" data-toggle="modal" data-target="#exampleModal">
  Agregar Noticia
</button>

<!-- Modal -->
<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Noticia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="p-5  col-12" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="titulo">Titulo: </label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i>
          </span>
        </div>
        <input type="text" name="titulo" id="titulo" class="form-control" required>
      </div>
    </div>

    <div class="form-group">
      <label for="parrafo">Parrafo: </label>
      <div class="input-group">
       
        <textarea id="parrafo" name="parrafo" class="form-control" rows="4" cols="50">

      </textarea>
      </div>
    </div>

    
    <div class="form-group">
              
              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="imagen" name="imagen">

              <!-- <p class="help-block">Peso máximo de la foto 2MB</p> -->

              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

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
        </select>
      </div>
    </div>
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
      </div>
    </div>
  </div>
</div>

<h3 class=" text-center text-secondary">Administración noticias </h3>

<?php

$info =  NoticiaControlador::ctrRegistroNoticia();

if ($info == "ok") {
  // echo $info;
echo ' <div class="alert alert-success">Se ha guardado correctamente </div>';

echo "<script> 
const alert =  document.querySelector('.alert');

if(alert){
 setTimeout(() => {
   alert.remove();
   window.location = 'index.php?page=noticia';
  
 }, 3000);
}
</script>";

}

?>

<table class="table  table-striped table-ligth ">




<?php
                  $eliminar = new NoticiaControlador();
                  $eliminar->ctrEliminarRegistro();
                  ?>  
    <thead>
        <tr> 
            <th>#</th>
            <th>Titulo</th>
            <th>Parrfo</th>
            <th>Imagen</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <?php
        foreach($infoMostrar as $key => $value):
        ?>
            <td><?php echo ($key+1); ?></td>
            <td><?php echo $value['titulo']; ?></td>
            <td><?php echo $value['texto']; ?></td>
            <td><img src="<?php echo $value['imagen']; ?>" class="img-thumbnail" width="100" alt=""></td>
            <td><?php echo $value['rol']; ?></td>
            <td>
             <div class="btn-group">
                 <a href="index.php?page=edit-noticia&id=<?php echo $value['id']; ?>" class="btn btn-warning m-1"> <i class="fas fa-pencil-alt text-white"></i></a>
                 
                 <form method="post">
                 <input type="hidden" value="<?php echo $value['id']; ?>" name="id_noticia"> 
                 <button type="submit" class="btn btn-danger  m-1"><i class="fas fa-trash-alt text-white"></i></button>
               
                   </form>
                 
             </div>

            </td>
        </tr>
        <?php
         endforeach
        ?>
        
    </tbody>
</table>

