<?php
	try{
		$HOST ="bsxhgkaksohfxjkryiij-mysql.services.clever-cloud.com";
		$BANCO="uhsel6hckcsczsdo";
		$USUARIO="uhsel6hckcsczsdo";
		$SENHA="rFYEjyUKSlOuLxpr20wk";

		$PDO = new PDO("mysql:host=".$HOST.";dbname=".$BANCO.";charset=utf8",$USUARIO,$SENHA);
	}catch(PDOException $erro){

		//echo "Erro de conexao, detalhes: " .$erro->getMessage();
		echo "conexao_erro";
	}
?>