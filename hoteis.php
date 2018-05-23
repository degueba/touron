<?php


// Conexão Banco
require_once("connection.php");


if(isset($_REQUEST)){
	$q = $_GET["palavrachave"];

	// Get Hoteis
	$sql = "select * from hoteis where nome like '%".$q."%'";
	$result = $con->query($sql);

	if($result->num_rows > 0){
		echo "<table style='text-align: center;' cellpadding='10'><caption>Resultado da busca</caption>
		<!--cabeçalho da busca--><thead><tr><th style='font-weight:bold;'>Nome</th><th style='font-weight:bold;'>Telefone</th></tr></thead>";
		while($row = $result->fetch_assoc()){
					echo "<tr>
						<td>'". $row["nome"] ."'</td>
						<td>'". $row["telefone"] ."'</td>
					</tr>";
		}
		echo "</table>";
	}

	// Get colaboradores join hotel
	$sql2 = "select c.nome, h.nome, c.ativo from colaboradores as c LEFT JOIN hoteis AS h ON c.id_hotel = 'h.id'";
	$result2 = $con->query($sql2);
	$atividade = ["<img src='usr_ativo.gif'>","<img src='usr_inativo.gif'>"];


	if($result2->num_rows > 0){
		while($row2 = $result2->fetch_array()){
			if($row2["ativo"] == 's'){
				echo $row2[0]. ' | '. $atividade[0].'<br/>';
			} else {
				echo $row2[0]. ' | '. $atividade[1].'<br/>';
			}
		}
	} else {
		echo "nao estaaa";
	}

	$conn->close();
}




?>