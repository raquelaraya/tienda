<?php
include 'conexionBD.php';
$abirCon = OpenCon();


if(isset($_REQUEST['idBorrar'])){
   
    $id= mysqli_real_escape_string($abirCon,$_REQUEST['idBorrar']);
    $query2="DELETE FROM producto WHERE IdProducto = '".$id."'";
    $res2=mysqli_query($abirCon,$query2);

    if($res2){
        
        echo "<script> swal({
            title: 'Atención',
            text: '¡Se borro correctamente!',
            type: 'success',
            showCancelButton: false,
    
            confirmButtonColor: 'green',
            confirmButtonText: 'Ok',
            closeOnConfirm: true
        },

            function (isConfirm) {
                window.location.href = 'panelAdmin.php?modulo=productos';
  
            }
        ); </script>";
        
    }

}
    
?>