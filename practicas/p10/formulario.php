<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
      ol, ul { 
      list-style-type: none;
      }
    </style>
    <title>Formulario</title>
</head>
<body>
    <h1>Datos Personales</h1>

    <form id="miFormulario" onsubmit="" method="post">
        <fieldset>
            <legend>Actualiza los datos personales de esta persona:</legend>
            <ul>
                <li>
                    <label>Nombre:</label> 
                    <input type="text" name="name" value="<?php 
                        // Verificar si el valor está en $_POST o $_GET antes de usarlo
                        if (!empty($_POST['nombre'])) {
                            echo htmlspecialchars($_POST['nombre']);
                        } elseif (!empty($_GET['nombre'])) {
                            echo htmlspecialchars($_GET['nombre']);
                        }
                    ?>">
                </li>
                <li>
                    <label>Edad:</label> 
                    <input type="text" name="age" value="<?php 
                        // Verificar si el valor está en $_POST o $_GET antes de usarlo
                        if (!empty($_POST['edad'])) {
                            echo htmlspecialchars($_POST['edad']);
                        } elseif (!empty($_GET['edad'])) {
                            echo htmlspecialchars($_GET['edad']);
                        }
                    ?>">
                </li>
            </ul>
        </fieldset>
        <p>
            <input type="submit" value="ENVIAR">
        </p>
    </form>
</body>
</html>
