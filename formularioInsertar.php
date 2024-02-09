<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Formulario para añadir Películas</title>
       
        <link href="css/styles.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        
        <section>
            <form name="formPerson" id="formPerson" action="saveFilm.php" method="post">
                <h2>Entrada de Películas a la Base de Datos</h2>
               
                        <div><label class="form-label">Identificador <span class="textoDanger">(*)</span></label>
                        <input type="text" required name="id" id="id"></div>
                      
                        <div><label class="form-label">Título <span class="textoDanger">(*)</span></label>
                        <input type="text" required name="titulo" id="titulo"></div>
                        
                        <div><label class="form-label">Género <span class="textoDanger">(*)</span></label>
                        <input type="text" required name="genero" id="genero"></div>

                        <div><label class="form-label">Fecha de Inicio de Proyección <span class="textoDanger">(*)</span></label>
                        <input type="date" required name="fechaInicio" id="fechaInicio"></div>

                        <div><label class="form-label">Fecha de Fin de Proyección <span class="textoDanger">(*)</span></label>
                        <input type="date" required name="fechaFin" id="fechaFin"></div>
                       
                        <input type="submit" value="GRABAR DATOS" name="saveData" id="saveData">
                        <div class="mt-4">
                            <span class="text-bg-danger p-2">(*) Datos Obligatorios</span>
                        </div>
                      
            </form>
        </section>
    
    </body>
</html>