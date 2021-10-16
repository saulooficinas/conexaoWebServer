<?php
	
	include('conexao.php');
	
	$num_sensor =$_GET['num_sensor'];
	$sensor=$_GET['sensor'];
	
	$sql = "INSERT INTO tbdata (sensor,num_sensor) VALUES (:sensor,:num_sensor)";

	$stmt = $PDO->prepare($sql);

	$stmt->bindParam(':sensor', $sensor);
	$stmt->bindParam(':num_sensor', $num_sensor);
	

	if($stmt->execute()){
		echo "salvo_com_sucesso";
	}else{
		echo "erro_ao_salvar";
	}
?>