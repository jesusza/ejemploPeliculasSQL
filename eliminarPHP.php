<?php
 
    extract($_GET);
    require_once("conexion.php");
    $param = $cnx->prepare("DELETE FROM peliculas WHERE id like ?");
    $param->bind_param("s",$id);
    $param->execute();

    // Llamo a una web que diga que los datos se han grabado correctamente
    // con un botón de volver 
    $url = "exito.php";
    header("Location: $url");
    
?>