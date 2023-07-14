<?php
    
    //comprobar si llega el formulario
	if (isset($_POST['enviar'])) {
		try {
			//recuperar los datos de la petición y validarlos
			$nif 		= $_POST['nif'];
			$nombre 	= $_POST['nombre'];
			$apellidos 	= $_POST['apellidos'];

			if (empty($nif)) {
				throw new Exception("Nif obligatorio");
			}

			if (empty($nombre)) {
				throw new Exception("Nombre obligatorio");
			}

			if (empty($apellidos)) {
				throw new Exception("Apellidos obligatorios");
			}
				
			//confeccionar fila a guardar en formato csv
			$datospersona = "$nif;$nombre;$apellidos\n";
     
			//escribir la fila en el fichero sin que se pierda el contenido previo (añadiendo un salto de linea al final)
			$fichero = fopen('archivos/03_datos.txt', 'a');
 
			fwrite($fichero, $datospersona);

			fclose($fichero);
			
			//confeccionar el mensaje a mostrar
			$mensajes = "Datos guardados";
		} catch (Exception $e) {
			$mensajes = $e->getMessage();
		}
	}       
?>
<!DOCTYPE html>
<html>
<head>
	<title>Escritura ficheros</title>
	<meta charset='UTF-8'>	
	<style type="text/css">
		form {width: 350px;padding: 20px;margin:auto;border:1px solid blue;background-color: lightblue}
		label {display: inline-block;width: 120px;}
        #mensajes {text-align: center;}
	</style>
</head>
<body>
	<form method="post" action='#'>
		<label>Nif: </label>
		<input type="text" name="nif" value="<?php echo $nif ?? null?>"><br>
		<label>Nombre: </label>
		<input type="text" name="nombre" value="<?php echo $nombre ?? null?>"><br>
		<label>Apellidos: </label>
		<input type="text" name="apellidos" value="<?php echo $apellidos ?? null?>"><br><br>
		<input type="submit" value='Enviar' name='enviar'>
	</form>
    <p id='mensajes'><?php echo $mensajes ?? null;?></p>
</body>
</html>