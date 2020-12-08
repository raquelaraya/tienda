  <?php
    include 'conexionBD.php';
    $abirCon = OpenCon();
    if(isset($_REQUEST['idBorrar'])){
      echo "<script>      swal({
        title: 'Atención',
        text: '¡Desea modificar el teléfono?',
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: 'No',
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Sí',
        closeOnConfirm: false,
        closeOnCancel: true
    },

        function (isConfirm) {
            if (isConfirm) {";
            $id= mysqli_real_escape_string($abirCon,$_REQUEST['idBorrar']);
            $query2="DELETE FROM usuario WHERE IdUsuario = '".$id."'";
            $res2=mysqli_query($abirCon,$query2);
            echo "window.location.href = 'panelAdmin.php?modulo=usuarios';
            
            }
            
        }
      );
</script>";


    }
    
  ?>


<?php
function Eliminar(){  
  $abirCon = OpenCon();
            $id= mysqli_real_escape_string($abirCon,$_REQUEST['idBorrar']);
            $query2="DELETE FROM usuario WHERE IdUsuario = '".$id."'";
            $res2=mysqli_query($abirCon,$query2);}?>
  <!--Content Wrapper. Contains page content TABLA DE ADMINISTRACION DE USUARIOS-->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administración de Usuarios</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
              <a class="btn btn-primary" href="panelAdmin.php?modulo=crearUsuario" role="button">Agregar Nuevo Usuario</a>
                </br>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Dirección</th>
                    <th>Telefono</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                <tbody>
                    <?php
                        //include 'conexionBD.php';
                        $query="SELECT IdUsuario,CedulaUsuario, NombreUsuario,ApellidoUsuario, correoUsuario, direccionUsuario, telefonoUsuario, rol.NombreRol FROM usuario INNER JOIN rol on usuario.idRol = rol.IdRol";
                        $abirCon = OpenCon();
                        $res= mysqli_query($abirCon,$query);
                    
                        while($row= mysqli_fetch_assoc($res)){
                    ?>        
                        <tr>
                            <td><?php echo $row['CedulaUsuario'] ?></td>
                            <td><?php echo $row['NombreUsuario'] ?></td>
                            <td><?php echo $row['ApellidoUsuario'] ?></td>
                            <td><?php echo $row['correoUsuario'] ?></td>
                            <td><?php echo $row['direccionUsuario'] ?></td>
                            <td><?php echo $row['telefonoUsuario'] ?></td>
                            <td><?php echo $row['NombreRol'] ?></td>
                            <td>
                                <a href="panelAdmin.php?modulo=editarUsuario&id=<?php echo $row['IdUsuario'] ?>"><i class="fas fa-edit"></i></a>
                                <a href="#" class="text-danger "><i onclick="Eliminar(<?php echo $row['IdUsuario'] ?>)" class="fas fa-trash"></i></a>
                            </td>.
                            
                        </tr>
                    <?php
                        }

                    ?>
                 
                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <script>
    function Eliminar(id){

      swal({
        title: 'Atención',
        text: '¡Desea eliminar el usuario!',
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: 'No',
        confirmButtonColor: 'red',
        confirmButtonText: 'Sí',
        closeOnConfirm: false,
        closeOnCancel: true
    },

        function (isConfirm) {
            if (isConfirm) {
              
            window.location.href = "panelAdmin.php?modulo=eliminarUsuario&idBorrar="+id;
            
            }
            
        }
      );

    }

    </script>