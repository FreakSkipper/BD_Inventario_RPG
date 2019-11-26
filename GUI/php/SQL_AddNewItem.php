<?php
	include("Conectar.php");
	$nome = $_POST['nomeI'];
	$precoB = $_POST['precoB'];
	$dano = $_POST['dano'];
	$forca = $_POST['forca'];
	$intelecto = $_POST['intelecto'];
	$vigor = $_POST['vigor'];
	$armadura = $_POST['armadura'];
	$tipo = $_POST['tipo'];
	$classes = $_POST['classes'];
	$durabilidade = $_POST['durabilidade'];
	$peso = $_POST['peso'];
	$desc = $_POST['descricao'];
	$flags = $_POST['flags'];
	
	$stmt = $servidor->prepare("INSERT INTO item(nome, preco_base, dano, forca, intelecto, vigor, armadura, tipo, classes, durabilidade, peso) VALUES (:nome, :preco_base, :dano, :forca, :intelecto, :vigor, :armadura, :tipo, :classes, :durabilidade, :peso)");
	$stmt->bindParam(':nome', $nome);
	$stmt->bindParam(':preco_base', $precoB);
	$stmt->bindParam(':dano', $dano);
	$stmt->bindParam(':forca', $forca);
	$stmt->bindParam(':intelecto', $intelecto);
	$stmt->bindParam(':vigor', $vigor);
	$stmt->bindParam(':armadura', $armadura);
	$stmt->bindParam(':tipo', $tipo);
	$stmt->bindParam(':classes', $classes);
	$stmt->bindParam(':durabilidade', $durabilidade);
	$stmt->bindParam(':peso', $peso);
	if(!$stmt->execute()){
		echo "Sinto muito, mas houve um erro na hora de enviar o comando ao servidor!";
	}

	header('Location:../manutencao.php');
?>