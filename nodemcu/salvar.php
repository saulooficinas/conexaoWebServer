<?php
	
	include('conexao.php');
	
	//Criando variáveis para enviar.
	$id_medidor=$_GET['id_medidor'];
	$nome_medidor=$_GET['nome_medidor'];
	$vazao =$_GET['vazao'];
	$sensor=$_GET['sensor'];

	
	//SQL da tabela medidor
	$sql = "INSERT INTO medidor (id_medidor,nome_medidor) VALUES (:id_medidor,:nome_medidor)";

	//SQL da tabela medidor_v
	$sql2= "INSERT INTO medidor_v (vazao,sensor) VALUES (:vazao,:sensor)";

	//Statements (Só vai preparar os dados para enviar)
	$stmt = $PDO->prepare($sql);
	$stmt1= $PDO->prepare($sql2);

	//Atribuindo os valores nas variáveis.
	//Tabela medidor
	$stmt->bindParam(':id_medidor', $id_medidor);
	$stmt->bindParam(':nome_medidor', $nome_medidor);
	
	//Tabela medidor_v
	$stmt1->bindParam(':vazao',$vazao);
	$stmt1->bindParam(':sensor',$sensor);	


	//Executando stmt
	if($stmt->execute()){
		echo "salvo_com_sucesso_tabela_1";
	}else{
		echo "erro_ao_salvar_tabela_1";
	}

	//Executando stmt1
	if($stmt1->execute())
	{
		echo "salvo_com_sucesso_tabela_2";
	}else{
		echo "\nerro_ao_salvar_tabela_2";
	}

?>
