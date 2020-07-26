
<?php include 'views/pages/header.php';?>

<?php include 'views/pages/navigation.php';?>

    <!-- Conenido -->
<div class="container-fluid">
    <div class="container py-5">
     
    <?php
      
      if(isset($_GET["page"])){
         if($_GET["page"] == "registro" || 
            $_GET["page"] == "login" || 
            $_GET["page"] == "edit-info" || 
            $_GET["page"] == "edit-noticia" || 
            $_GET["page"] == "usuario" || 
            $_GET["page"] == "inicio" || 
            $_GET["page"] == "informacion" || 
            $_GET["page"] == "noticias" || 
            $_GET["page"] == "noticia" || 
            $_GET["page"] == "logout"){

             include "pages/". $_GET["page"].".php";
            }else{
                include "pages/404.php";
            }

      }else{
          include "pages/login.php";
      }
    ?>

</div>
</div>

<?php include 'views/pages/footer.php';  ?>
