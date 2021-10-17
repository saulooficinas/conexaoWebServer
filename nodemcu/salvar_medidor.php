<?php

	include('conexao.php');

	//Dados para enviar
	$id_medidor=$_GET['id_medidor'];
	$nome_medidor=$_GET['nome_medidor'];

	//SQL da tabela medidor
	$sql = "INSERT INTO medidor (id_medidor,nome_medidor) VALUES (:id_medidor,:nome_medidor)";

	//Preparando statement
	$stmt = $PDO->prepare($sql);

	//Tabela medidor
	$stmt->bindParam(':id_medidor', $id_medidor);
	$stmt->bindParam(':nome_medidor', $nome_medidor);

	if($stmt->execute()){
		echo "salvo_com_sucesso_tabela_1";
	}else{
		echo "erro_ao_salvar_tabela_1";
	}

?>
