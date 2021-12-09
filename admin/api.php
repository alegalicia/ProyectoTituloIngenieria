
<?php
header('Content-Type: application/json');
$pdo=new PDO("mysql:dbname=smart;host=127.0.0.1","root","");
switch($_GET['q']){

		// Buscar Último Dato
		case 1:
            //humedad
		    $statement=$pdo->prepare("SELECT registros_monitorio as humedad FROM registros_monitoreo WHERE id_sensores = 1 ORDER BY id_registros_monitoreo DESC LIMIT 0,1");
			$statement->execute();
			$results=$statement->fetchAll(PDO::FETCH_ASSOC);
			$json=json_encode($results);
			echo $json;
            //http://localhost:3000/admin/api.php?q=1
		break; 

		// Buscar Todos los datos
		default:
			
			$statement=$pdo->prepare("SELECT registros_monitorio FROM registros_monitoreo WHERE id_sensores = 1 ORDER BY id_registros_monitoreo DESC");
			$statement->execute();
			$results=$statement->fetchAll(PDO::FETCH_ASSOC);
			$json=json_encode($results);
			echo $json;
		break;

}
?>
