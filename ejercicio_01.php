<?php
// Inicializar las variables a mostrar en el formulario
$pais = null;
$capital = null;
$poblacion = null;
$mensajes = null;

// Comprobar si se ha pulsado enviar
if (isset($_POST['enviar'])) {
    try {
        // Recuperar datos del formulario y validarlos
        $pais = $_POST['pais'];
        $capital = $_POST['capital'];
        $poblacion = $_POST['poblacion'];

        if (empty($pais)) {
            throw new Exception('Pais obligatorio');
        }

        if (empty($capital)) {
            throw new Exception('Capital obligatorio');
        }
        if (empty($poblacion)) {
            throw new Exception('Poblacion obligatoria');
        }

        // Confeccionar el texto que debe aparecer en la caja mensajes
        $mensajes = "$pais $capital $poblacion";

    } catch (Exception $e) {
        $mensajes = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulario sincrono</title>
    <meta charset='UTF-8'>    
    <style type="text/css">
        form {width: 350px;padding: 20px;margin:auto;border:1px solid grey;background-color: lightgreen}
        label {display: inline-block;width: 120px;}
        .mensajes {text-align: center; border:1px solid grey;width: 390px;margin: auto;}
    </style>
</head>
<body>
    <form method="post" action="#">
        <label>Pais: </label>
        <input type="text" name="pais" placeholder="Pais" value='<?php echo $pais ?? ''; ?>'><br>
        <label>Capital: </label>
        <input type="text" name="capital" placeholder="Capital" value='<?php echo $capital ?? ''; ?>'><br>
        <label>Poblacion: </label>
        <input type="text" name="poblacion" placeholder="Poblacion" value='<?php echo $poblacion ?? ''; ?>'><br>
        <input type="submit" value='Enviar' name='enviar'>
    </form>
    <br>
    <table>
		<tr>
			<td class='pais'><?php echo $pais;?></td>
			<td class='capital'><?php echo $capital;?></td>
			<td class='poblacion'><?php echo $poblacion;?></td>
		</tr>
	</table><br>
    <div class='mensajes'><?php echo $mensajes; ?></div>
	
</body>
</html>
