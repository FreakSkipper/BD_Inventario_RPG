<?php
	include("php/Conectar.php");
	
	$stmt = $servidor->prepare("SELECT item.nome, inventario.quantidade, item.tipo FROM item INNER JOIN inventario ON item.id_item = inventario.id_item");
	if(!$stmt->execute()){
		echo "Falha ao carregar o Inventario.";
	}
?>

<!doctype html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css" type="text/css">
        <link rel="stylesheet" href="loja.css" type="text/css">
        <link rel="stylesheet" href="inventario.css" type="text/css">
        <script>
            function selecionarItem(objeto, nomeItem){
                var selecionados = document.getElementsByClassName("selecionado");
                for (var i = 0; i < selecionados.length; i++){
                    selecionados[i].classList.remove("selecionado");
                }
                objeto.classList.add("selecionado");

                var objImagem = document.getElementById("imagemCompra");
                var objNomeItem = document.getElementById("nomeItem");
                var objPrecoItem = document.getElementById("precoItem");
                var objQtdItem = document.getElementById("qtdItem");
                var filhos = objeto.children;

                for (var i = 0; i < filhos.length; i++){
                    if(filhos[i].classList.contains("quantia")){
                        objQtdItem.innerHTML = filhos[i].innerHTML;
                    }
                    else if(filhos[i].classList.contains("preco")){
                        objPrecoItem.innerHTML = filhos[i].innerHTML;
                    }
                    else if(filhos[i].classList.contains("image")){
                        objImagem.innerHTML = filhos[i].innerHTML;
                    }
                }
            
                objNomeItem.innerHTML = nomeItem;
            }

            function equiparItem(){
                var selecionados = document.getElementsByClassName("selecionado");
                if(selecionados.length > 0){
                    var filhos = selecionados[0].children;
                    var tipo = -1;
                    var imagem = "";

                    for (var i = 0; i < filhos.length; i++){
                        if(filhos[i].classList.contains("tipo")){
                            tipo = filhos[i].innerHTML;
                        }
                        else if(filhos[i].classList.contains("image")){
                            imagem = filhos[i].innerHTML;
                        }
                    }

                    var peca = document.getElementById("cabeca");
                    if(tipo == 0){
                        peca = document.getElementById("cabeca");
                    }
                    else if(tipo == 1){
                        peca = document.getElementById("roupa");
                    }
                    else if(tipo == 2){
                        peca = document.getElementById("calca");
                    }
                    else if(tipo == 3){
                        peca = document.getElementById("sapato");
                    }
                    else if(tipo == 4){
                        peca = document.getElementById("espada");
                    }
                    else if(tipo == 5){
                        peca = document.getElementById("escudo");
                    }
                    else if(tipo == 6){
                        peca = document.getElementById("adaga");
                    }
                    else if(tipo == 7){
                        peca = document.getElementById("magia");
                    }
                    peca.innerHTML = "<scan class=\"image\">" + imagem + "</scan>";
                }
            }
        </script>
        <script src="./inventario.js"></script>
        <title>RPG - Client v1.2</title>
    </head>
    <body>
        <div id="menuBar">
            <ul id="menu" class="menu">
                <li><a href="index.php">Início</a></li>
                <li><a href="loja.php">Loja</a></li>
                <li><a href="inventario.php">Inventário</a></li>
                <li><a href="armazem.php">Armazém</a></li>
            </ul>
        </div>
		<div id="conteudo">
			<div class="loja">
                <ul id="listaItens">
                    <?php
                    $tipo = 'elmo';
                    while($rs = $stmt->fetch(PDO::FETCH_ASSOC)){
                        if($rs['tipo'] == 1)
                            $tipo = 'armadura';
                        else if($rs['tipo'] == 2)
                            $tipo = 'inferior';
                        else if($rs['tipo'] == 3)
                            $tipo = 'sapatos';
                        else if($rs['tipo'] == 4)
                            $tipo = 'arma';
                        else if($rs['tipo'] == 5)
                            $tipo = 'secundaria';
                        else if($rs['tipo'] == 6)
                            $tipo = 'colar';
                        else if($rs['tipo'] == 7)
                            $tipo = 'brinco';
                        
                    ?>
                    <li onclick="selecionarItem(this, '<?php echo $rs['nome'] ?>')">
                        <scan class="quantia">x<?php echo $rs['quantidade'] ?></scan>
                        <scan class="preco"><?php echo $tipo ?></scan>
                        <scan class="image"><img src="_imagens/machado.jpg" alt=""></scan>
                        <scan class="tipo"><?php echo $rs['tipo'] ?></scan>
                    </li>
                    <?php
                    }

                    $stmt = $servidor->prepare("SELECT item.nome, item.tipo FROM item INNER JOIN equipamento ON item.id_item = equipamento.id_item ORDER BY item.tipo");
                    $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    if(!$stmt->execute()){
                        echo "Falha ao carregar o Inventario.";
                    }

					?>
                </ul>
            </div>
            <div class="compra">
                <div class="conteudo-compra">
                    <div class="inventario-esquerdo">
                        <ul id="inventario-esquerdo">
                            <?php
                            $rows = $stmt->fetchAll();
                            foreach ($rows as $r) {
                                if ($r['tipo'] > 4){
                                    continue;
                                }
                            ?>
                            <li class="itensInv cabeca" id="cabeca" onclick="selecionarItem(this, '<?php echo $r['nome'] ?>')">
                                <scan class="image"><img src="_imagens/machado.jpg" alt=""></scan>
                            </li>
                            <?php
                            }
                            ?>
                            
                            <!-- <li class="itensInv cabeca" id="cabeca" onclick="selecionarItem(this, 'Machadinho do Bidu')">
                                <scan class="image"><img src="_imagens/machado.jpg" alt=""></scan>
                            </li>
                            <li class="itensInv roupa" id="roupa" onclick="selecionarItem(this, 'Machadinho do Bidu')">
                                <scan class="image"><img src="_imagens/vestidodamorte.png" alt=""></scan>
                            </li>
                            <li class="itensInv calca" id="calca" onclick="selecionarItem(this, 'Machadinho do Bidu')">
                                <scan class="image"><img src="_imagens/machado.jpg" alt=""></scan>
                            </li>
                            <li class="itensInv sapato" id="sapato" onclick="selecionarItem(this, 'Machadinho do Bidu')">
                                <scan class="image"><img src="_imagens/machado.jpg" alt=""></scan>
                            </li> -->
                        </ul>
                    </div>
                    <div class="escopoImage">
                        <div class="imagemCompra" id="imagemCompra">
                            <img src="_imagens/machado.jpg" alt="">
                        </div>
                        <div class="escopoBotoes">
                            <div class="infos-item">
                                <p>Nome: <scan class="nomeItem" id="nomeItem">Nenhum</scan></p>
                                <p>Preço: <scan class="precoItem" id="precoItem">Nenhum</scan></p>
                                <p>Quantia: <scan class="qtdItem" id="qtdItem">Nenhum</scan></p>
                            </div>
                            <div class="botoes">
                                <p class="btnComprar" onclick="equiparItem()">Equipar</p>
                                <p class="btnComprar">Vender</p>
                            </div>
                        </div>
                    </div>
                    <div class="inventario-direito">
                        <ul id="inventario-direito">
                            <?php
                            foreach ($rows as $r) {
                                if ($r['tipo'] <= 4){
                                    continue;
                                }
                            ?>
                            <li class="itensInv cabeca" id="cabeca" onclick="selecionarItem(this, '<?php echo $r['nome'] ?>')">
                                <scan class="image"><img src="_imagens/machado.jpg" alt=""></scan>
                            </li>
                            <?php
                            }
                            ?>

                            <!-- <li class="itensInv espada" id="espada" onclick="selecionarItem(this, 'Machadinho do Bidu')">
                                <scan class="image"><img src="_imagens/Acalamador.png" alt=""></scan>
                            </li>
                            <li class="itensInv escudo" id="escudo" onclick="selecionarItem(this, 'Machadinho do Bidu')">
                                <scan class="image"><img src="_imagens/espadacongelante.png" alt=""></scan>
                            </li>
                            <li class="itensInv adaga" id="adaga" onclick="selecionarItem(this, 'Machadinho do Bidu')">
                                <scan class="image"><img src="_imagens/machado.jpg" alt=""></scan>
                            </li>
                            <li class="itensInv magia" id="magia" onclick="selecionarItem(this, 'Machadinho do Bidu')">
                                <scan class="image"><img src="_imagens/machado.jpg" alt=""></scan>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>
		</div>
        <!-- You can also require other files to run in this process -->
        <!-- <script src="./renderer.js"></script>         -->
    </body>

</html>
