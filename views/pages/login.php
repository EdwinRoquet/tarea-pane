<h2 class="text-center m-4">Iniciar Sesión</h2>

<div class="d-flex justify-content-center text-center">

  <form class="p-5 bg-light" method="post">
  
    <div class="form-group">
      <label for="correo">Correo</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"> <i class="fa fa-envelope" aria-hidden="true"></i>
          </span>
        </div>
        <input type="email" name="correo" id="correo" class="form-control" required>
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
    
    <?php
      

       //Forma en que se instancia la clase de un método estático
          $login = new UsuarioControlador();
          $login->ctrLogin();

  
   ?>

    
    <button type="submit" id="btnEnviar" class="btn btn-primary">Enviar</button>
  </form>

</div>
