<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<option value="-1" selected="selected">---Seleccione la hora---</option>
<?php 

	while ($fila = $result->fetch_object()) 
	{
?>
	<option><?php echo $fila->cithora ?></option>
	<?php
		}
	?>
	
</body>
</html>