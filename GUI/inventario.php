<?php
	include("php/Conectar.php");
	$idJogador = 5;
    $stmt = $servidor->prepare("SELECT item.id_item, item.nome, inventario.quantidade, item.tipo FROM inventario INNER JOIN item ON item.id_item = inventario.id_item WHERE inventario.id_personagem = :idJogador");
    $stmt->bindParam(':idJogador', $idJogador);
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
                var objQtdItemI = document.getElementById("quantiaI");
                var objIdItem = document.getElementById("idItem");
                var filhos = objeto.children;

                for (var i = 0; i < filhos.length; i++){
                    if(filhos[i].classList.contains("quantia")){
                        objQtdItem.innerHTML = filhos[i].innerHTML;
                        objQtdItemI.value = filhos[i].innerHTML.replace("x", "");
                    }
                    else if(filhos[i].classList.contains("preco")){
                        objPrecoItem.innerHTML = filhos[i].innerHTML;
                    }
                    else if(filhos[i].classList.contains("image")){
                        objImagem.innerHTML = filhos[i].innerHTML;
                    }
                    else if(filhos[i].classList.contains("idItemT")){
                        objIdItem.value = filhos[i].innerHTML;
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

            function surgirModale(){
                document.getElementById("modale").style.display = "block";
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
                        if($rs['tipo'] == 0)
                            $tipo = 'elmo';
                        else if($rs['tipo'] == 1)
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
                        <scan class="image"><img src="_imagens/<?php echo str_replace(" ", "", $rs['nome']) ?>.jpg" alt=""></scan>
                        <scan class="tipo"><?php echo $rs['tipo'] ?></scan>
                        <scan class="idItemT"><?php echo $rs['id_item'] ?></scan>
                    </li>
                    <?php
                    }

                    $stmt = $servidor->prepare("SELECT item.nome, item.tipo FROM item INNER JOIN equipamento ON item.id_item = equipamento.id_item WHERE equipamento.id_personagem = :idJogador ORDER BY item.tipo");
                    $stmt->bindParam(':idJogador', $idJogador);
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
                            $tipo = "cabeca";
                            foreach ($rows as $r) {
                                if($r['tipo'] == 0)
                                    $tipo = 'cabeca';
                                else if($r['tipo'] == 1)
                                    $tipo = 'roupa';
                                else if($r['tipo'] == 2)
                                    $tipo = 'calca';
                                else if($r['tipo'] == 3)
                                    $tipo = 'sapato';
                                else
                                    break;
                            ?>
                            <li class="itensInv <?php echo $tipo ?>" id="<?php echo $tipo ?>" onclick="selecionarItem(this, '<?php echo $r['nome'] ?>')">
                                <scan class="image"><img src="_imagens/<?php echo str_replace(" ", "", $r['nome']) ?>.jpg" alt=""></scan>
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
                                <form action="php/SQL_EquiparItem.php" method="post">
                                    <input type="text" name="idItem" id="idItem" class="sumir" value="nenhum"/>
                                    <input type="text" name="idJogador" id="idJogador" class="sumir" value="<?php echo $idJogador ?>"/>
                                    <input type="number" name="quantiaI" id="quantiaI" class="sumir" value="0"/>
                                    <button class="btnComprar" type="submit">Equipar</button>
                                </form>
                                <!-- <p class="btnComprar" onclick="equiparItem()">Equipar</p> -->
                                <button class="btnComprar" onclick="surgirModale()">Vender</p>
                            </div>
                        </div>
                    </div>
                    <div class="inventario-direito">
                        <ul id="inventario-direito">
                            <?php
                            $tipo = "espada";
                            foreach ($rows as $r) {
                                if($r['tipo'] == 4)
                                    $tipo = 'espada';
                                else if($r['tipo'] == 5)
                                    $tipo = 'escudo';
                                else if($r['tipo'] == 6)
                                    $tipo = 'adaga';
                                else if($r['tipo'] == 7)
                                    $tipo = 'magia';
                                else
                                    continue;
                            ?>
                            <li class="itensInv <?php echo $tipo ?>" id="<?php echo $tipo ?>" onclick="selecionarItem(this, '<?php echo $r['nome'] ?>')">
                                <scan class="image"><img src="_imagens/<?php echo str_replace(" ", "", $r['nome']) ?>.jpg" alt=""></scan>
                            </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
		</div>
        <!-- You can also require other files to run in this process -->
        <!-- <script src="./renderer.js"></script>         -->
        <div class="modale" id="modale">
            
        </div>
    </body>

</html>
