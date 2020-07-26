
<h2 class="text-center">Noticias</h2>
<?php



?>



<?php  
         $edad = (int)$_SESSION['edad'];
         if ($edad < 18) {  
           echo '<h3 class="text-center">Contenido para menores</h3>';
           echo '<div class="row">';
        $informacion = NoticiaControlador::ctrMostarCatNotRegistro("rol", "menor");
        foreach($informacion as $key => $value){
                   
?>
  <div class="col-md-4 mt-4">
        <div class="card">
  <img class="card-img-top" src="<?php echo $value["imagen"]; ?>" width="100" alt="Card image cap">
  <div class="card-body">
    <h4 class="card-title"><?php echo $value["titulo"]; ?></h4>
    <p class="card-text">
    <?php echo $value["texto"]; ?>
    </p>
 
  </div>
</div>

</div>
<?php 
        }
        echo '</div>';
      }
        
?>
<?php  
         $edad = (int)$_SESSION['edad'];
         if ($edad > 18) {  
           echo '<h3 class="text-center text-secondary">Contenido para mayores</h3>';
           echo '<div class="row">';
        $informacion = NoticiaControlador::ctrMostarCatNotRegistro("rol", "mayor");
        foreach($informacion as $key => $value){
                   
?>
  <div class="col-md-4 mt-4">
        <div class="card">
  <img class="card-img-top" src="<?php echo $value["imagen"]; ?>" width="100" alt="Card image cap">
  <div class="card-body">
    <h4 class="card-title"><?php echo $value["titulo"]; ?></h4>
    <p class="card-text">
    <?php echo $value["texto"]; ?>
    </p>
 
  </div>
</div>

</div>
<?php
        }
        echo '</div>';

      }
        
?>










