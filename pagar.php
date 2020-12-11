<?php 
include 'config.php';
include 'conexionBD.php';
include 'miCarrito.php';
session_start();
?>

<?php 
if($_POST){

    $total=0;
    $SID=session_id();
    $Correo=$_POST['email'];

    foreach($_SESSION['Carrito'] as $indice=>$producto){

        $total=$total+($producto['Precio']*$producto['Cantidad']);

          
    
}
      

        
   // echo "<h3>".$total."</h3>";
}
?>

<style>
    
    /* Media query for mobile viewport */
    @media screen and (max-width: 400px) {
        #paypal-button-container {
            width: 100%;
        }
    }
    
    /* Media query for desktop viewport */
    @media screen and (min-width: 400px) {
        #paypal-button-container {
            width: 250px;
            display: inline-block;
        }
    }
    
</style>


<div class="jumbotron text-center">
    <h1 class="display-4">¡Paso Final !</h1>
    <hr class="my-4">
    <p class="lead"> Estas a punto de pagar con paypal la cantidad de: 
       



        <h4>$<?php echo number_format($total,2);?></h4>
         <script
    src="https://www.paypal.com/sdk/js?client-id=sb"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
  </script>

  <div id="paypal-button-container"></div>

  <script>
    paypal.Buttons().render('#paypal-button-container');
    // This function displays Smart Payment Buttons on your web page.
  </script>
             </div>       
    


<script>
    paypal.Button.render({
        env: 'sandbox', // sandbox | production
        style: {
            label: 'checkout',  // checkout | credit | pay | buynow | generic
            size:  'responsive', // small | medium | large | responsive
            shape: 'pill',   // pill | rect
            color: 'gold'   // gold | blue | silver | black
        },

        // PayPal Client IDs - replace with your own
        // Create a PayPal app: https://developer.paypal.com/developer/applications/create

        client: {
            sandbox:    'AT8_lTzfJFl5e8ShpPgV7_NcDctVhV0EdRWEagGGhKehR65OE8vSBInsHI7BpueswMcm4Zdu_EGW_eSR',
            production: 'AWj1U3wK7eRFvKZJaonh6COY08MnxVt-SMj3kn2cCg257hpWEs0aA9PNDP1fBK1_COigMz9nG_-RYqaW'
        },

        // Wait for the PayPal button to be clicked

        payment: function(data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            amount: { total: '<?php echo $total;?>', currency: 'MXN' }, 
                            description:"Compra de productos a Develoteca:$<?php echo number_format($total,2);?>",
                            custom:"<?php echo $SID;?>#<?php echo openssl_encrypt($idVenta,COD,KEY); ?>"
                        }
                    ]
                }
            });
        },

        // Wait for the payment to be authorized by the customer

        onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function() {
                console.log(data);
                window.location="verificador.php?paymentToken="+data.paymentToken+"&paymentID="+data.paymentID;
            });
        }
    
    }, '#paypal-button-container');

</script>

 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures optimal rendering on mobile devices. -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->
</head>


