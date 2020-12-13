<?php

$abirCon = OpenCon();
 

    $mensaje="";

    if(isset($_POST['btnAnadir'])){

        switch($_POST['btnAnadir']){

            case 'Agregar':
                
                if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
                    $ID=openssl_decrypt($_POST['id'],COD,KEY);
                    $mensaje.="OK ID correcto".$ID."<br/>";
                }else{
                    $mensaje.="Upss.... ID incorrecto".$ID."<br/>";
                }

                if(is_String(openssl_decrypt($_POST['nombre'],COD,KEY))){
                    $nombre=openssl_decrypt($_POST['nombre'],COD,KEY);
                    $mensaje.="OK nombre".$nombre."<br/>";
                }else{
                    $mensaje.="Upss.... nombre incorrecto".$nombre."<br/>";
                }

                if(is_numeric(openssl_decrypt($_POST['precio'],COD,KEY))){
                    $precio=openssl_decrypt($_POST['precio'],COD,KEY);
                    $mensaje.="OK precio".$precio."<br/>";
                }else{
                    $mensaje.="Upss.... precio incorrecto".$precio."<br/>";
                }

                if(is_numeric(openssl_decrypt($_POST['cantidad'],COD,KEY))){
                    $cantidad=openssl_decrypt($_POST['cantidad'],COD,KEY);
                    $mensaje.="OK cantidad".$cantidad."<br/>";
                }else{
                    $mensaje.="Upss.... cantidad incorrecta".$cantidad."<br/>";
                }

                if(!isset($_SESSION['Carrito'])){
                    $producto=array(
                        'ID'=> $ID,
                        'Precio'=>$precio,
                        'Nombre'=>$nombre,
                        'Cantidad'=>$cantidad
                    );
                    $_SESSION['Carrito'][0]=$producto;
                }else{

                    $idProductos = array_column($_SESSION['Carrito'],"ID");
                    
                    if(in_array($ID,$idProductos)){
<<<<<<< Updated upstream
                        echo"<script>alert('El producto ya ha sido agregado al carrito');   window.location.href = 'index2.php?modulo=verProductos';</script>";
=======
                        echo"<script>alert('El producto ya ha sido agregado al carrito');
                        window.location.href='index2.php?modulo=verProductos'
                        </script>";
>>>>>>> Stashed changes

                    }else{
                    
                    $numeroProductos=count($_SESSION['Carrito']);
                    $producto=array(
                        'ID'=> $ID,
                        'Precio'=>$precio,
                        'Nombre'=>$nombre,
                        'Cantidad'=>$cantidad
                    );
                    $_SESSION['Carrito'][$numeroProductos]=$producto;

                    echo'<script type="text/javascript">
                    alert("Se agrego producto al carrito");
                    window.location.href="index2.php?modulo=verProductos";
                    </script>';;
                      
                    }
                }
                
            break;

        case "Eliminar": 
            if(is_numeric( openssl_decrypt($_POST['id'],COD,KEY ))){
                    $ID=openssl_decrypt($_POST['id'],COD,KEY );
                    
                 foreach($_SESSION['Carrito'] as $indice=>$producto){
                    if($producto['ID']==$ID){
                        unset($_SESSION['Carrito'][$indice]);
                        echo "<script> swal({}</script>";

                    }


                 }   

             }else{
                 $mensaje.="Upss... ID incorrecto".$ID."<br/>";
             }

        break; 









        


    }


}

?>
