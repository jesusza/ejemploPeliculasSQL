<?php
    if (!isset($_GET['id'])) {
        header("Location:index.php");
    }
    else {
        extract($_GET);
        require_once("conexion.php");
        //Cargo todos los campos con *//
        $param = $cnx->prepare("SELECT * FROM peliculas WHERE id like ?");
        $param->bind_param("s",$id);
        $param->execute();
        $data = $param->get_result();
        $row = $data->fetch_assoc(); //Leemos la fila de datos obtenida//
        extract($row);
        $cnx->close();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Formulario para eliminar películas</title>
        <link href="css/styles.css" type="text/css" rel="stylesheet">
    </head>
    <body>
      
        <section>
            
        <form name="formEliminar" id="formEliminar">
                <h2>Entrada de Películas a la Base de Datos</h2>
               
                    <div><label class="form-label">Identificador <span class="textoDanger">(*)</span></label>
                    <input type="text" required name="id" id="id" value="<?php echo $id; ?>"></div>
                      
                    <div><label class="form-label">Título <span class="textoDanger">(*)</span></label>
                    <input type="text" required name="titulo" id="titulo" value="<?php echo $titulo; ?>"></div>
                        
                    <div><label class="form-label">Género <span class="textoDanger">(*)</span></label>
                    <input type="text" required name="genero" id="genero" value="<?php echo $genero; ?>"></div>

                    <div><label class="form-label">Fecha de Inicio de Proyección <span class="textoDanger">(*)</span></label>
                    <input type="date" required name="fechaInicio" id="fechaInicio" value="<?php echo $fechaInicio; ?>"></div>

                    <div><label class="form-label">Fecha de Fin de Proyección <span class="textoDanger">(*)</span></label>
                    <input type="date" required name="fechaFin" id="fechaFin" value="<?php echo $fechaFin; ?>"></div>
                    
                    <div><a href="eliminarPHP.php?id=<?php echo $id; ?>" class="btn btn-danger">Confirmar Eliminación</a>
                    </div>
                       
                      
            </form>

        
        </section>
   
  
    </body>
</html>