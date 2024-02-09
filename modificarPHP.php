<?php
    
    extract($_POST);
    require_once("conexion.php");
    $param = $cnx->prepare("UPDATE peliculas SET titulo = ?, genero = ?, fechaInicio = ?, fechaFin = ? WHERE id like ?");
    $param->bind_param("sssss",$titulo,$genero,$fechaInicio, $fechaFin,$id);
    $param->execute();
    $cnx->close();
   
    // Llamo a una web que diga que los datos se han grabado correctamente
    // con un botón de volver 
    $url = "exito.php";
    header("Location: $url");
    
?>