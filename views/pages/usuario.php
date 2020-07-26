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

 
$user = UsuarioControlador::ctrMostarRegistro(null, null);



?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary m-3" data-toggle="modal" data-target="#exampleModal">
  Agregar Usuario
</button>

<!-- Modal -->
<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="p-5  col-12    " method="post">
   <div class="row">
    <div class="col-6">
      <label for="nombre">Nombre: </label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i>
          </span>
        </div>
        <input type="text" name="nombre" id="nombre" class="form-control" required>
      </div>
    </div>

    <div class="col-6">
      <label for="edad">Edad: </label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="far fa-calendar-plus"></i>
          </span>
        </div>
        <input type="number" min="10" max="100" name="edad" id="edad" class="form-control" required>
      </div>
    </div>
    </div>
    <div class="form-group">
      <label for="correo">Correo</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"> <i class="fa fa-envelope" aria-hidden="true"></i>
          </span>
        </div>
        <input type="text" name="correo" id="nuevousuario" class="form-control" >
      </div>
    </div>

    <div class="form-group">
      <label for="rol">Rol</label>
      <div class="input-group">
        <div class="input-group-prepend">
        <span class="input-group-text"> <i class="fa fa-lock"></i></span>
        </div>      
        <select class="form-control input-lg" name="rol">
           <option value=""> Seleccionar categoría</option>
           <option value="administrador">Administrador</option>
           <option value="usuario">Usuario</option>
        </select>
      </div>
    </div>

  
    <div class="form-group">
      <label for="contrasena">Contraseña</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i>
          </span>
        </div>
        <input type="password" name="contrasena" id="contrasena" class="form-control" required>
      </div>
    </div>
    
    <div class="custom-control custom-checkbox my-3">
       <input type="checkbox" name="info" class="custom-control-input " id="info">
       <label class="custom-control-label" for="info">¿Esta interesado en la información de la Pagina?</label>
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
<h3 class=" text-center text-secondary">Administración de usuarios</h3>


<table class="table  table-striped table-ligth ">
<?php
    
    $registro = UsuarioControlador::ctrRegistro();

 if ($registro == "ok") {
   echo ' <div class="alert alert-success">El usuario ha sido registrado </div>';

   echo "<script> 
   const alert =  document.querySelector('.alert');

   if(alert){
     setTimeout(() => {
       alert.remove();
       window.history.replaceState( null, null, window.location.href );
       location.reload();
     }, 3000);
   }
   </script>";

 }
    
?>







<?php
                  $eliminar = new UsuarioControlador();
                  $eliminar->ctrEliminarRegistro();
                  ?>  
    <thead>
        <tr> 
            <th>#</th>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Rol</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <?php
        foreach($user as $key => $value):
        ?>
            <td><?php echo ($key+1); ?></td>
            <td><?php echo $value['nombre']; ?></td>
            <td><?php echo $value['edad']; ?></td>
            <td><?php echo $value['rol']; ?></td>
            <td><?php echo $value['correo']; ?></td>
            <td>
             <div class="btn-group">
                 <!-- <a href="index.php?page=edit&id=" class="btn btn-warning m-1"> <i class="fas fa-pencil-alt text-white"></i></a> -->
                 
                 <form method="post">
                 <input type="hidden" value="<?php echo $value['id']; ?>" name="id_usuario"> 
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
