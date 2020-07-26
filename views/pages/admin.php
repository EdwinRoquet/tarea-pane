

<h1 class="text-center">Panel de Administracón</h1>

<div class="row mt-5 bg-white">
    <div class="col-md-3 col-sm-12 d-flex flex-column">
      <a class="p-2 btn btn-success btn-block" href="#">Usuarios</a>
      <a class="p-2 btn btn-success btn-block" href="#">Recetas</a>
      <a class="p-2 btn btn-success btn-block" href="#">Pots</a>
      <a class="p-2 btn btn-success btn-block" href="#">Salir</a> 
    </div>
    <div class="col-9">

    </div>
</div>

<table class="table  table-striped table-ligth ">
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
                 <!-- <a href="index.php?page=edit&id=<?php echo $value['id']; ?>" class="btn btn-warning m-1"> <i class="fas fa-pencil-alt text-white"></i></a> -->
                 
                 <form method="post">
                 <input type="hidden" value="<?php echo $value['id']; ?>" name="deleteRegistry"> 
                 <button type="submit" class="btn btn-danger  m-1"><i class="fas fa-trash-alt text-white"></i></button>
                  <?php
                   
                //    $delete = new UsuarioControlador();
                //    $delete->ct;
                   
                   

                  ?>
                 
                 
                 </form>
                 
             </div>

            </td>
        </tr>
        <?php
         endforeach
        ?>
        
    </tbody>
</table>





