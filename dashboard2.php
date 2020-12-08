 <!DOCTYPE html>
<html>
<?php
  session_start();
  if(isset($_SESSION['idUsuario'])==false){
    header("location:index2.php");
   
    }

?>


<head>

  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


   <title>Technosystems | Tienda</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  
  <!-- Google Font: Source Sans Pro -->
 
   <!-- icheck bootstrap -->
   <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/simple-sidebar.css" rel="stylesheet">
  <link href="css/EstilosSitio.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>
<form action="" >


  <div class="d-flex" id="wrapper">

    <div class="bg-light border-right" id="sidebar-wrapper">
<div class="user-panel mt-3 pb-3 mb-3 d-flex">
         <a href="#" class="brand-link">
      <img src="dist/img/Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">TechnoSystems</span>
    </a>
</div>
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">Bienvenid@ <?php echo $_SESSION['nombreUsuario'] ?></a>
        </div>
      </div>
      <div class="list-group list-group-flush">
        
        <?php include'menu.php' ?>

      </div>
    </div>
      <nav class="mt">
       

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#"><i class="fa fa-paper-plane-o"></i><span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </div>
      </nav>
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <br>
          </br>
          <h3 class="m-0 text-dark"><a href="javascript:void();">Carrito de Compra</a></h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index2.php">Home</a></li>
              <li class="breadcrumb-item active">Inicio</li>
            </ol>
          </div>
        </div>
        <div class="container">
   

<div class="container">
<div class="panel panel-default">
<div class="panel-heading"> 

<ul class="nav nav-pills">
  <li role="presentation" class="active"><a href="index.php">Inicio</a></li>
  <li role="presentation"><a href="VerCarta.php">Ver Carta</a></li>
  <li role="presentation"><a href="Pagos.php">Pagos</a></li>
</ul>
</div>

<div class="panel-body">
    <h1>Mis Productos</h1>
    <a href="VerCarta.php" class="cart-link" title="Ver Carta"><i class="glyphicon glyphicon-shopping-cart"></i></a>
    <div id="products" class="row list-group">
         <?php
                     include 'conexionBD.php';
                     $query="SELECT * FROM producto";
                     $abirCon = OpenCon();
                     $res= mysqli_query($abirCon,$query);

                     while($row= mysqli_fetch_assoc($res)){
                  ?>
        <div class="item col-lg-4">
            <div class="thumbnail">
                <div class="caption">
                    <h4 class="list-group-item-heading"><?php echo $row["NombreProducto"]; ?></h4>
                    
                    <img height="200px" src="data:image/jpg;base64,<?php echo base64_encode($row['Imagen']); ?>"/>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="lead"><?php echo '$'.$row["PrecioUnitario"].' USD'; ?></p>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-success" href="AccionCarta.php?action=addToCart&id=<?php echo $row["id"]; ?>">Agregar a la Carta</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } T_ELSE  ?>
        
        
    </div>
        </div>







  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/FuncionesSitio.js"></script>
  
  <script>
   
    
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });

  
  
 

  </script>
</form>
</body>
</html>
