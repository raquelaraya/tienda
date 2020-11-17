<?php
    include 'conexionBD.php';
    
?>
  <!--Content Wrapper. Contains page content TABLA DE ADMINISTRACION DE USUARIOS-->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administración de Proveedores</h1>
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
              <a class="btn btn-primary" href="panelAdmin.php?modulo=crearProveedor" role="button">Agregar Nuevo Proveedor</a>
                </br>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Cedula Juridica</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                <tbody>
                    <?php
                        //include 'conexionBD.php';
                        $query="SELECT IdProveedor,NombreProveedor, CedulaProveedor,CorreoProveedor, Telefono FROM proveedor";
                        $abirCon = OpenCon();
                        $res= mysqli_query($abirCon,$query);
                    
                        while($row= mysqli_fetch_assoc($res)){
                    ?>        
                        <tr>
                            <td><?php echo $row['CedulaProveedor'] ?></td>
                            <td><?php echo $row['NombreProveedor'] ?></td>
                            <td><?php echo $row['CorreoProveedor'] ?></td>
                            <td><?php echo $row['Telefono'] ?></td>
                            <td>
                                <a href="panelAdmin.php?modulo=editarProveedor&id=<?php echo $row['IdProveedor'] ?>"><i class="fas fa-edit"></i></a>
                                <a href="#" class="text-danger "><i onclick="Eliminar(<?php echo $row['IdProveedor'] ?>)" class="fas fa-trash"></i></a>
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
        text: '¡Desea eliminar el proveedor!',
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
              
            window.location.href = "panelAdmin.php?modulo=eliminarProveedor&idBorrar="+id;
            
            }
            
        }
      );

    }

    </script>