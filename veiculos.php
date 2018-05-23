<?php
/*
Obtenha as opções de veículos (opcao1, opcao2 e opcao3) e teste
se elas são diferentes entre si.
Caso duas ou três opções forem iguais, o sistema deve alertar.
Dica: comece por obter o conteúdo do formulário. Ex.:
Depois utilize if (se) para avaliar as expressões...
*/

$option1 = $_POST["opcao1"];
$option2 = $_POST["opcao2"];
$option3 = $_POST["opcao3"];

if(($option1 == $option2) || ($option1 == $option3) || ($option2 == $option3)){
	echo "Você deve selecionar opções diferentes!";

	return;
}


function pay_bus($age) {
	$price = 0;
	$category = '';

	if($age >= 2 && $age <= 5){
		$category = 'infantil';
		$price = 90;
	} else if($age > 5 && $age < 60){
		$category = 'adulto';
		$price = 150;
	} else if($age > 60){
		$category = 'melhor idade';
		$price = 120;
	}

	echo "Categoria:".$category."<br/>Preço da passagem: ".$price;
}

pay_bus(10);


?>