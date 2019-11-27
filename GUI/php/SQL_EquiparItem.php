<?php
	include("Conectar.php");	
	$item = $_POST['idItem'];
	echo $item;
	if(false == true){
		$stmt = $servidor->prepare("INSERT INTO inventario VALUES (:listaJogadores, :listaItens, :qtd)");
		$stmt->bindParam(':listaJogadores', $jogador);
		$stmt->bindParam(':listaItens', $item);
		$stmt->bindParam(':qtd', $qtd);
		if(!$stmt->execute()){
			echo "Sinto muito, mas houve um erro na hora de enviar o comando ao servidor!";
		}

		header('Location:../manutencao.php');
	}
?>
