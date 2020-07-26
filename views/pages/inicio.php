

<h3 class="text-center ">Información pagina</h3>


<?php  
   $edad = (int)$_SESSION['edad'];
   if ($edad < 18) {  
     echo '<h3 class="text-center text-secondary">Contenido para menores</h3>';
  $informacion = InformacionControlador::ctrMostarRegistroCat("rol", "menor");
  foreach($informacion as $key => $value){              
?>

 

<div id="div<?php echo ($key+1); ?>" class="container m-5 p-5">
      <h2> <?php echo $value["titulo"]; ?></h2>
    <p id= "p1">
    <?php echo $value["texto"]; ?> </p>       
      <img src="<?php echo $value["imagen"]; ?>" class="mx-auto d-block rounded-circle" alt="Historia" width="304" height="236"> 
      <img>
</div> 
<?php
        }  
      }
?>


<?php  
  $edad = (int)$_SESSION['edad'];
  if ($edad > 18) {  
  echo '<h3 class="text-center text-secondary">Contenido para mayores</h3>';
  $informacion = InformacionControlador::ctrMostarRegistroCat("rol", "mayor");
  foreach($informacion as $key => $value){              
?>

 

<div id="div<?php echo ($key+1); ?>" class="container m-5 p-5">
      <h2> <?php echo $value["titulo"]; ?></h2>
    <p id= "p1">
    <?php echo $value["texto"]; ?> </p>       
      <img src="<?php echo $value["imagen"]; ?>" class="mx-auto d-block rounded-circle" alt="Historia" width="304" height="236"> 
      <img>
</div> 
<?php
        }  
      }
?>

