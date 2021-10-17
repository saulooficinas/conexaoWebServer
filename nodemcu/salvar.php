<?php
	
	include('conexao.php');
	
	//Criando variáveis para enviar.
	$vazao =$_GET['vazao'];
	$sensor=$_GET['sensor'];
	$id_medidor_c=$_GET['id_medidor_c'];

	
	//SQL da tabela medidor_v
	$sql2= "INSERT INTO medidor_v (vazao,sensor,id_medidor) VALUES (:vazao,:sensor,:id_medidor)";

	//Statements (Só vai preparar os dados para enviar)
	$stmt1= $PDO->prepare($sql2);

	//Atribuindo os valores nas variáveis.
	//Tabela medidor_v
	$stmt1->bindParam(':vazao',$vazao);
	$stmt1->bindParam(':sensor',$sensor);
	$stmt1->bindParam(':id_medidor',$id_medidor_c);

	//Executando stmt1
	if($stmt1->execute())
	{
		echo "salvo_com_sucesso_tabela_2";
	}else{
		echo "erro_ao_salvar_tabela_2";
	}

?>
