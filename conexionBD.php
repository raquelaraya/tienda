<?php

    function OpenCon()
    {
        $servidor = "localhost";
        $usuario = "root";
        $password = "";
        $baseDatos = "tienda";

        $conn = new mysqli($servidor,$usuario,$password,$baseDatos) or die("Connect failed:" . $conn -> error);
        
        return $conn;
    }
    
    function CloseCon($conn)
    {
        $conn -> close();
    }

?>
