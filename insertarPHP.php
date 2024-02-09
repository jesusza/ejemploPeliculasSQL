
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Guardar datos en la BD</title>
        <link href="css/styles.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <?php 
              //Procedemos a la conexión con el servidor y la BD//
              require_once("conexion.php");
              //Extraemos todos los datos del formulario//
              extract($_POST);
              //vamos a comprobar si existe el id dentro de nuestra tabla personas para comunicárselo al usuario//
              //Preparamos la sentencia SQL por parámetros//
              $param = $cnx->prepare("SELECT id FROM peliculas WHERE id like ?");
              //Esta Sentencia SQL Buscar un id que sea igual al que vamos a suministrar por parámetro ? que se lo vamos a sustituir por el introducido por el formulario en la siguiente sentencia//
              $param->bind_param("s",$id); //Esta sentencia sustituye la ? por el contenido de la variable $nif e indicamos que es string con la s entrecomillada//
              $param->execute(); //Ejecutamos la sentencia y el resultado se carga en $data//
              if ($param->error) {
                //Si se ha producido un error/
               
                }
              else{
                    $data = $param->get_result(); //Cogemos los resultados devueltos por la consulta//
                    if ($data->num_rows > 0) {
                        //Si nos devuelve un resultado mayor de 0 quiere decir que hemos encontrado ese NIF en la tabla, avisamos//
                        echo "El Identificador introducido ya existe<br><a href='formularioInsertar.php' class='btn btn-dark'>VOLVER AL FORMULARIO</a>";
                    }
                    else{
                        //En caso de que no exista el nif pasamos a su almacenamiento//
                        $param = $cnx->prepare("INSERT INTO peliculas (id,titulo,genero,fechaInicio,fechaFin) VALUES (?,?,?,?,?)");
                        //Al ya existir para la conexión un prepare simplemente se sustituye la sentencia a ejecutar//
                        //Pasamos a darle los 4 parámetros//
                        
                        // Los parámetros se llaman como el name que pongamos en formulario
                        $param->bind_param("sssss",$id,$titulo,$genero,$fechaInicio,$fechaFin);
                        $param->execute();
                        if ($param->error) {
                            echo "Se ha producido un error, inténtalo más tarde<br><a href='addFilm.php' class='btn btn-dark'>VOLVER AL FORMULARIO</a>";
                        }
                        else {
                            echo "El proceso se ha realizado con éxito<br><a href='addFilm.php' class='btn btn-dark'>VOLVER AL FORMULARIO</a>";
                        }
                    }
                }
        ?>
    </body>
</html>