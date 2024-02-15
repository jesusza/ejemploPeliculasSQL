<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Listado por Título</title>
        <link href="css/styles.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        
        <nav aria-label="breadcrumb">
           <a href="index.php" class="text-dark">Inicio</a>/Buscar Título
        </nav>
        <?php    
              if (!isset($_POST['filtro'])) {
                //Si no existe la variable filtro, mostramos un pequeño formulario para ayudar a mostrar mejor una tabla grande de datos//
                ?>
                <section>
                    <form name="form1" id="form1" method="post" action="consultaFiltro.php">
                        <label>Introduzca Título a buscar</label>
                        <input type="text" required maxlength="10" placeholder="Teclear Titulo" name="filtro" id="filtro">
                        <input type="submit" class="btn btn-dark" value="Aceptar">
                    </form>
                </section>

                <?php
              }
              else{
                //Sí existe la variable es que el usuario hizo clic y recargo la página, pasamos a mostrar el listado según su petición//
                ?>
                <section>
                    <h2>Resultados</h2>

                <table class="table">
                    <header class="text-center">
                        <tr class="text-center">
                            <th>Identificador</th>
                            <th>Título</th>
                            <th>Genero</th>
                            <th>Fecha de Inicio</th>
                            <th>Fecha de Finalización</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>
                        </tr>
                    </header>
                    <tbody>
                        <?php
                            //Abrimos desde aquí PHP para cargar los resultados//
                            //Nos conectamos al SERVER y a la BD//
                            require_once("conexion.php");
                            extract($_POST);
                            //Preparamos la sentencia a ejecutar, en este caso si hay parámetro -> los apellidos//
                            $param = $cnx->prepare("SELECT id, titulo, genero, DATE_FORMAT(fechaInicio,'%d-%m-%Y') as 'fecha', DATE_FORMAT(fechaFin,'%d-%m-%Y') as 'fecha2' FROM peliculas WHERE titulo like ? ORDER BY id, genero");
                            $param->bind_param("s",$filtro); // Tantas s's como interrogaciones en el SELECT
                            //Ejecutamos//
                            $param->execute();
                            $data = $param->get_result();
                            //get result recoge los resultados obtenidos y los carga en la variable data//
                            if ($data->num_rows == 0) {
                                echo "Ese Titulo no está en la Base de Datos<br>";
                                echo "<a href='consultaFiltro.php' class='btn btn-secondary'>Volver</a>";
                            }
                            else {
                                
                            while ($row = $data->fetch_assoc()) {
                                //fetch assoc devuelve un array o fila que se carga en la variable $row (la podremos llamar como queramos)//
                                extract($row); //Extraemos cada fila y creamos los tr y td//
                                echo "<tr><td class='text-center'>$id</td><td class='text-center'>$titulo</td><td class='text-center'>$genero</td><td class='text-center'>$fecha</td><td class='text-center'>$fecha2</td><td class='text-center'><a href='formularioModificar.php?id=$id' class='btn btn-warning'>Modificar</a></td><td class='text-center'><a href='formularioEliminar.php?id=$id' class='btn btn-danger'>Eliminar</a></td></tr>";
                            }
                            $cnx->close();//Cerramos la conexión//
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6" class="text-center">
                                <a href="consultaFiltro.php" class="btn btn-secondary">Volver</a>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                </section>
                <?php
              }
            }
        ?>
  
    </body>
</html>