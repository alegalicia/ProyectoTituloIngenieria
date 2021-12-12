
<?php
error_reporting(0);
header('Content-Type: application/json');
$pdo=new PDO("mysql:dbname=smart;host=127.0.0.1","root","");
//$pdo=new PDO("mysql:dbname=id17674836_smart;host=localhost","id17674836_agronomy","j*[MSTUO-c5Sd9%F");
$pdo=new PDO("mysql:dbname=id18110680_smart;host=localhost","id18110680_agronomy","2du+c9=mX#KXoU+[");
switch($_GET['q']){

		// Buscar Último Dato
		case 1:
            //humedad
		    $statement=$pdo->prepare("SELECT registros_monitorio as humedad, fecha, hora FROM registros_monitoreo WHERE id_tipo_registro = 1 ORDER BY id_registros_monitoreo DESC LIMIT 0,1");
			$statement->execute();
			$results=$statement->fetchAll(PDO::FETCH_ASSOC);
			$json=json_encode($results);
			echo $json;
            //http://localhost:3000/admin/api.php?q=1
		break; 

		case 2:
            //temperatura
		    $statement=$pdo->prepare("SELECT registros_monitorio as temperatura, fecha, hora FROM registros_monitoreo WHERE id_tipo_registro = 2 ORDER BY id_registros_monitoreo DESC LIMIT 0,1");
			$statement->execute();
			$results=$statement->fetchAll(PDO::FETCH_ASSOC);
			$json=json_encode($results);
			echo $json;
            //http://localhost:3000/admin/api.php?q=2
		break; 

		// Buscar Todos los datos
		default:
			$statement=$pdo->prepare("SELECT registros_monitorio, fecha, hora FROM registros_monitoreo WHERE id_sensores = 1 ORDER BY id_registros_monitoreo DESC");
			$statement->execute();
			$results=$statement->fetchAll(PDO::FETCH_ASSOC);
			$json=json_encode($results);
			echo $json;
		break;

}
?>
