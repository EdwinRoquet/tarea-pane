<h2 class="text-center m-4">Resgistrarse</h2>
<div class="d-flex justify-content-center text-center">
 
  <form class="p-5 bg-light col-6    " method="post">
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

    <?php
      //Forma que se instancia la clas de un método no estático
      //  $registry =  new ControllerForms();
      //  $registry -> ctrRegistry();

       //Forma en que se instancia la clase de un método estático
       $registry = UsuarioControlador::ctrRegistro();

    if ($registry == "ok") {
      echo ' <div class="alert alert-success">El usuario ha sido registrado </div>';

      echo "<script> 
      const alert =  document.querySelector('.alert');

      if(alert){
        setTimeout(() => {
          alert.remove();
          window.reload();
          window.history.replaceState( null, null, window.location.href );
        }, 3000);
      }
      </script>";

    }
       
   ?>

    
  
    <button type="submit" id="btnEnviar" class=" btn btn-primary ">Enviar</button>
    
  </form>

</div>
