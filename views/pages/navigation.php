 <!-- Navegacion -->
 <nav class="navbar fixed-top navbar-expand-lg navbar-brown bg-brown fixed-top ">
    <div class="container">
      <a class="navbar-brand" href="index.php?page=inicio">
      <img src="views/img/Icono.png" height="50" width="100" alt="">
      </a>
      
     
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="text-white"> <i class="fa fa-bars" aria-hidden="true"></i></span>
      </button>
     
          
       
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">   
        <?php
            if (isset($_SESSION['validarIngreso']) == "ok") {  
              echo '  <li class="nav-item">
                         <a class="nav-link text-white mx-1"'. 'href="index.php?page=noticias"> Noticias</a>
              </li> '; 
            

             ?>

          <?php
            if ($_SESSION['rol'] == "administrador" ) {

             echo '  <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Administración
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="index.php?page=noticia">Noticias</a>
                <a class="dropdown-item" href="index.php?page=informacion">Información</a>
                <a class="dropdown-item" href="index.php?page=usuario">Usuario</a>
               </div>
             </li>';
            }
          }
            ?>

        </ul>
        <?php
            if (isset($_SESSION['validarIngreso']) != "ok") {

              
              echo ' <a class="nav-item text-white mx-1"'. 'href="index.php?page=login"> Iniciar Sesion</a>';
              echo ' <a class="nav-item text-white mx-1"'. 'href="index.php?page=registro"> Registrarse</a>';          
          }else{

            echo '<a class="nav-item text-white mx-1"' .  'href="index.php?page=logout"> Cerrar Session</a>';        


           }
        
        ?>


      </div>
    </div>
    
  </nav>
