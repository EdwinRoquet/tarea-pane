<?php







    if (isset($_SESSION['validarIngreso']) == "ok" && $_SESSION['info'] == true && $_GET['page'] == 'inicio' )  {
                   
echo ' <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <!-- Slide One - Set the background image for this slide in the line below -->
    <div class="carousel-item active">
      <img src="views/img/Pan_1.jpg" width="100%">
      <div class="carousel-caption d-none d-md-block">
        <h3>First Slide</h3>
        <p>This is a description for the first slide.</p>
      </div>
    </div>
    <!-- Slide Two - Set the background image for this slide in the line below -->
    <div class="carousel-item" >
        <img src="views/img/Pan_2.jpg" width="100%">
      <div class="carousel-caption d-none d-md-block">
        <h3>Second Slide</h3>
        <p>This is a description for the second slide.</p>
      </div>
    </div>
    <!-- Slide Three - Set the background image for this slide in the line below -->
    <div class="carousel-item">
        <img src="views/img/Pan_3.jpg"  width="100%">
      <div class="carousel-caption d-none d-md-block">
        <h3>Third Slide</h3>
        <p>This is a description for the third slide.</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>';
            }

 ?>
 
 
 
 
 <!-- Footer -->
  <footer class="py-5 bg-brown-oscuro">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 ">
                <p class="mx-auto  text-center text-white">Siguenos: </p>
                 <ul class="mt-3 ">
                   <li class="nav-item d-flex  justify-content-around">
                   <a class="nav-link  text-white   "style="font-size: 28px;" href="#"><i class="fab fa-facebook-f"></i></a>
                   <a class="nav-link  text-white  " style="font-size: 28px;" href="#"> <i class="fab fa-instagram"></i></a>
                   <a class="nav-link  text-white  " style="font-size: 28px;" href="#"><i class="fab fa-twitter"></i></a>
                   </li>
                </ul>
              </div>
              <div class="col-lg-4">
                  <p class="m-0 text-center text-white">Mision & vision</p>
                  <p class="m-0 text-center text-white mt-2">Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido
                     del texto de un sitio mientras que mira su diseño..</p>
              </div>
              <div class="col-lg-4 ">
                  <p class="m-0 text-center text-white">Ubicacion</p>
                  <p class="m-0 text-center text-white mt-2">Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido
                     del texto de un sitio mientras que mira su diseño..</p>
              </div>
        </div>
      <p class="m-0 text-center text-white">Copyright &copy; AROMA 2020</p>
    </div>
    <!-- /.container -->
  </footer>
  <?php  echo $_GET["page"] == "registro" ? "<script src=".'views'.'/'.'js'.'/'.'usuario'.'.js'."></script>" : ""; ?>
  <?php  echo isset($_GET["page"]) == "usuario" ? "<script src=".'views'.'/'.'js'.'/'.'usuario'.'.js'."></script>" : ""; ?>

  <script src="views/js/app.js"></script>    
</body>
</html>
