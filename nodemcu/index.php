<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> SMWF - Base de Dados </title>

	<style type="text/css">
		/* ESTILOS GERAIS */
		.container{
			width: 50%;
			margin: 0 auto;
		}

		/* ESTILOS FORMULARIOS*/
		.areaPesquisa{
			border-radius:  5px;
			background-color: #B5B5B5;
			padding:  10px;
		}

		input {
			padding:  10px;
			margin:  8px 0;
			border:  1px solid #000;
			border-radius: 4px;
		}


		input[type=text]
		{
			width: 15%;
		}

		input[type="submit"]
		{
			width: 20%;
			background-color: #006500;
			color:  #fff;
			cursor: pointer;

		}
		/* ESTILOS TABELA */

		table{
			border-collapse: collapse;
			width: 100%;
			margin-top: 10px;
		}

		table th{
			background-color: #32CD32;
			color: #fff;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="areaPesquisa">
			<form action="" method="POST">
				<input type="text" name="data" placeholder="mês/ano">
				<input type="submit" name="submit" value="Buscar" >
			</form> 
		</div>
	<?php
		include ('conexao.php');

		if($_SERVER['REQUEST_METHOD']=="POST")
		{
			//echo "<h1> Recebeu a data: ".$_POST['data']."</h1>";
			$dataPesquisa=$_POST['data'];
			$dataArray = explode("/",$dataPesquisa);
			$dataPesquisa=$dataArray[1]."-".$dataArray[0];

			$sql = "SELECT * FROM tbdata WHERE data_hora LIKE '%". $dataPesquisa."%'";

		}
		else
		{
			//echo "<h1> Não recebeu nada. Vai mostrar mês atual </h1>";
			$dataAtual=date ('Y-m');

			//echo " Mês atual: ".$dataAtual;

			$sql ="SELECT * FROM tbdata WHERE data_hora LIKE '%".$dataAtual."%'";
		}

		$stmt=$PDO ->prepare($sql);
		$stmt->execute();

		echo "<table border=\"1\">";

		echo "<tr>
			<th> ID_sensor  </th>
			<th> Sensor </th>
			<th> Data/Hora </th>
		</tr>";

		while ($linha = $stmt->fetch(PDO::FETCH_OBJ))
		{
			$timestamp = strtotime($linha->data_hora);
			$dataTabela = date('d/m/Y H:i:s',$timestamp);

			echo "<tr>";
			echo "<td>".$linha->num_sensor." </td>";
			echo "<td>".$linha->sensor."</td>";
			echo "<td> ".$dataTabela."</td>";
			echo "</tr>";
		}

		echo "</table>";
	?>
	</div>
</body>
</html>