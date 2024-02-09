<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Lista Simple</title>
        <link href="css/styles.css" type="text/css" rel="stylesheet">
    </head>
    <body>
       
    <section>
        <h2 class="text-bg-warning p-3">Resultados</h2>

            <!-- Creamos nuestra tabla y su cabecera -->
            <table class="table">
                <header class="text-center">
                    <tr class="text-center">
                        <th>Identificador</th>
                        <th>Titulo</th>
                        <th>Genero</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </header>
            <tbody>

        <?php    

            require_once("conexion.php"); // Es necesario que 
            $SQL = "SELECT * FROM peliculas";
             
            //Preparamos la sentencia a ejecutar, en este caso como son todos los registros a mostrar no hay parámetros//
            $data = $cnx->query($SQL); //Esta sentencia ejecuta el SQL y el resultado lo carga en la variable $data, ahora solo con un bucle vamos mostrando los resultados//
            while ($row = $data->fetch_assoc()) {
                //fetch assoc devuelve un array o fila que se carga en la variable $row (la podremos llamar como queramos)//
                extract($row); //Extraemos cada fila y creamos los tr y td//
                // Los campos serán como estén llamados en la base de datos
                echo "<tr><td class='text-center'>$id</td><td class='text-center'>$titulo</td><td class='text-center'>$genero</td><td class='text-center'>$fechaInicio</td><td class='text-center'>$fechaFin</td><td class='text-center'><a href='formularioModificar.php?id=$id' class='btn btn-warning'>Modificar</a></td><td class='text-center'><a href='formularioEliminar.php?id=$id' class='btn btn-danger'>Eliminar</a></td></tr>";
            }                
            $cnx->close();//Cerramos la conexión//
            ?>                
                </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6" class="text-center">
                                <a href="index.php">Volver</a>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </section>
                
  
    </body>
</html>