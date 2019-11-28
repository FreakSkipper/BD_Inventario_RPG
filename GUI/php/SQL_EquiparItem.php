<?php
	include("Conectar.php");	
	$jogador = $_POST['idJogador'];
	$item = $_POST['idItem'];
	$quantia = $_POST['quantiaI'];
	
	if($item != "nenhum" && intval($quantia) > 0){
		$stmt = $servidor->prepare("SELECT id_item, tipo FROM item where id_item = :idItem");
		$stmt->bindParam(':idItem', $item);
		if(!$stmt->execute()){
			echo "Sinto muito, mas houve um erro na hora de enviar o comando ao servidor!";
		}

		$tipo = -1;
		while($rs = $stmt->fetch(PDO::FETCH_ASSOC)){
			$tipo = $rs['tipo'];
		}

		if($tipo != -1){
			$stmt = $servidor->prepare("SELECT equipamento.id_item FROM equipamento INNER JOIN item ON item.id_item = equipamento.id_item where equipamento.id_personagem = :idPersonagem and item.tipo = :tipoItem");
			$stmt->bindParam(':idPersonagem', $jogador);
			$stmt->bindParam(':tipoItem', $tipo);
			if(!$stmt->execute()){
				echo "Sinto muito, mas houve um erro na hora de enviar o comando ao servidor!";
			}

			$idItem = -1;
			while($rs = $stmt->fetch(PDO::FETCH_ASSOC)){
				$idItem = $rs['id_item'];
			}

			if($tipo < 8 && $idItem != -1){
				$stmt = $servidor->prepare("DELETE equipamento FROM equipamento INNER JOIN item ON item.id_item = equipamento.id_item where item.tipo = :tipoItem and equipamento.id_personagem = :idPersonagem");
				$stmt->bindParam(':tipoItem', $tipo);
				$stmt->bindParam(':idPersonagem', $jogador);
				if(!$stmt->execute()){
					echo "Sinto muito, mas houve um erro na hora de enviar o comando ao servidor!";
				}

				$stmt = $servidor->prepare("INSERT INTO equipamento VALUES (:idPersonagem, :idItem)");
				$stmt->bindParam(':idPersonagem', $jogador);
				$stmt->bindParam(':idItem', $item);
				if(!$stmt->execute()){
					echo "Sinto muito, mas houve um erro na hora de enviar o comando ao servidor!";
				}

				if($quantia <= 1){
					$stmt = $servidor->prepare("DELETE inventario FROM inventario where inventario.id_item = :idItem and inventario.id_personagem = :idPersonagem");
				}
				else{
					$stmt = $servidor->prepare("UPDATE inventario SET inventario.quantidade = :quantia where inventario.id_item = :idItem and inventario.id_personagem = :idPersonagem");
					$quantidade = $quantia - 1;
					$stmt->bindParam(':quantia', $quantidade);
				}
				
				$stmt->bindParam(':idItem', $item);
				$stmt->bindParam(':idPersonagem', $jogador);
				if(!$stmt->execute()){
					echo "Sinto muito, mas houve um erro na hora de enviar o comando ao servidor!";
				}

				$stmt = $servidor->prepare("SELECT quantidade FROM inventario where inventario.id_item = :idItem and inventario.id_personagem = :idPersonagem");
				$stmt->bindParam(':idPersonagem', $jogador);
				$stmt->bindParam(':idItem', $idItem);
				if(!$stmt->execute()){
					echo "Sinto muito, mas houve um erro na hora de enviar o comando ao servidor!";
				}

				$quantidade = 0;
				while($rs = $stmt->fetch(PDO::FETCH_ASSOC)){
					$quantidade = $rs['quantidade'];
				}

				if($quantidade <= 0){
					$stmt = $servidor->prepare("INSERT INTO inventario VALUES (:idPersonagem, :idItem, 1)");
				}
				else{
					$stmt = $servidor->prepare("UPDATE inventario SET inventario.quantidade = :quantia where inventario.id_item = :idItem and inventario.id_personagem = :idPersonagem");
					$aux = $quantidade + 1;
					$stmt->bindParam(':quantia', $aux);
				}

				$stmt->bindParam(':idPersonagem', $jogador);
				$stmt->bindParam(':idItem', $idItem);
				if(!$stmt->execute()){
					echo "Sinto muito, mas houve um erro na hora de enviar o comando ao servidor!";
				}
			}
		}
	}

	header('Location:../inventario.php');
	
?>
