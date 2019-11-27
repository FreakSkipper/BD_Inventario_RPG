<?php
	include("php/Conectar.php");
	
	$stmt = $servidor->prepare("SELECT * FROM item INNER JOIN venda ON item.id_item = venda.id_item INNER JOIN personagem ON personagem.id_personagem = venda.id_vendedor INNER JOIN tipo_item ON item.tipo = tipo_item.id");
	if(!$stmt->execute()){
		echo "Falha ao carregar as Vendas.";
	}
?>

<!doctype html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css" type="text/css">
        <link rel="stylesheet" href="loja.css" type="text/css">
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
                var objVendedor = document.getElementById("vendedor");
                var objDanoT = document.getElementById("pDanoT");
                var objForcaT = document.getElementById("pForcaT");
                var objIntelectoT = document.getElementById("pIntelectoT");
                var objVigorT = document.getElementById("pVigorT");
                var objArmaduraT = document.getElementById("pArmaduraT");
                var objDurabilidadeT = document.getElementById("pDurabilidadeT");
                var objTipo = document.getElementById("tipo");
                var objClasses = document.getElementById("classes");
                var objPeso = document.getElementById("peso");

                var objDano = document.getElementById("pDano");
                var objForca = document.getElementById("pForca");
                var objIntelecto = document.getElementById("pIntelecto");
                var objVigor = document.getElementById("pVigor");
                var objArmadura = document.getElementById("pArmadura");
                var objDurabilidade = document.getElementById("pDurabilidade");

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

                    else if(filhos[i].classList.contains("anunciante")){
                        objVendedor.innerHTML = filhos[i].innerHTML;
                    }
                    else if(filhos[i].classList.contains("dano")){
                        objDanoT.innerHTML = filhos[i].innerHTML;
                        objDano.style.width = String(Number(filhos[i].innerHTML) * 100 / 2000) + "%";
                    }
                    else if(filhos[i].classList.contains("forca")){
                        objForcaT.innerHTML = filhos[i].innerHTML;
                        objForca.style.width = String(Number(filhos[i].innerHTML) * 100 / 2000) + "%";
                    }
                    else if(filhos[i].classList.contains("intelecto")){
                        objIntelectoT.innerHTML = filhos[i].innerHTML;
                        objIntelecto.style.width = String(Number(filhos[i].innerHTML) * 100 / 2000) + "%";
                    }
                    else if(filhos[i].classList.contains("vigor")){
                        objVigorT.innerHTML = filhos[i].innerHTML;
                        objVigor.style.width = String(Number(filhos[i].innerHTML) * 100 / 2000) + "%";
                    }
                    else if(filhos[i].classList.contains("armadura")){
                        objArmaduraT.innerHTML = filhos[i].innerHTML;
                        objArmadura.style.width = String(Number(filhos[i].innerHTML) * 100 / 2000) + "%";
                    }
                    else if(filhos[i].classList.contains("tipo")){
                        objTipo.innerHTML = filhos[i].innerHTML;
                    }
                    else if(filhos[i].classList.contains("classes")){
                        objClasses.innerHTML = filhos[i].innerHTML;
                    }
                    else if(filhos[i].classList.contains("durabilidade")){
                        objDurabilidadeT.innerHTML = filhos[i].innerHTML;
                        objDurabilidade.style.width = String(Number(filhos[i].innerHTML) * 100 / 2000) + "%";
                    }
                    else if(filhos[i].classList.contains("peso")){
                        objPeso.innerHTML = filhos[i].innerHTML;
                    }
                }
            
                objNomeItem.innerHTML = nomeItem;
            }
        </script>
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
                <!-- Lista de Itens a Venda -->
                <ul id="itensLoja">
                    <?php
                    while($rs = $stmt->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <li onclick="selecionarItem(this, '<?php echo $rs['nome'] ?>')" class="selected">
                        <scan class="quantia">x<?php echo $rs['quantidade'] ?></scan>
                        <scan class="preco"><?php echo $rs['preco_unit'] ?></scan>
                        <scan class="image"><img src="_imagens/<?php echo str_replace(" ", "", $rs['nome']) ?>.jpg" alt=""></scan>
                        <scan class="sumir anunciante"><?php echo $rs['name'] ?></scan>
                        <scan class="sumir dano"><?php echo $rs['dano'] ?></scan>
                        <scan class="sumir forca"><?php echo $rs['forca'] ?></scan>
                        <scan class="sumir intelecto"><?php echo $rs['intelecto'] ?></scan>
                        <scan class="sumir vigor"><?php echo $rs['vigor'] ?></scan>
                        <scan class="sumir armadura"><?php echo $rs['armadura'] ?></scan>
                        <scan class="sumir tipo"><?php echo $rs['descricao'] ?></scan>
                        <scan class="sumir classes"><?php echo $rs['classes'] ?></scan>
                        <scan class="sumir durabilidade"><?php echo $rs['durabilidade'] ?></scan>
                        <scan class="sumir peso"><?php echo $rs['peso'] ?></scan>
                    </li>
                    <?php
                    }
					?>
                </ul>
            </div>
            <div class="compra">
                <div class="escopoImage">
                    <div class="imagemCompra" id="imagemCompra">
                        <img src="_imagens/machado.jpg" alt="">
                    </div>
                </div>
                <div class="escopoBotoes">
                    <div class="infos-item">
                        <p>Nome: <scan class="nomeItem" id="nomeItem">Nenhum</scan></p>
                        <p>Preço: <scan class="precoItem" id="precoItem">Nenhum</scan></p>
                        <p>Quantia a Venda: <scan class="qtdItem" id="qtdItem">Nenhum</scan></p>
                        <p>Tipo: <scan class="tipo" id="tipo">Nenhum</scan></p>
                        <p>Classes: <scan class="classes" id="classes">Nenhum</scan></p>
                        <p>Peso: <scan class="peso" id="peso">Nenhum</scan></p>
                        <p>Vendedor: <scan class="vendedor" id="vendedor">Nenhum</scan></p>
                    </div>
                    <div class="botoes">
                        <p class="btnComprar">Comprar</p>
                        <p class="btnPre">Pré-Compra</p>
                    </div>
                </div>
                <div class="atributos">
                    <div class="pDano">
                        <div class="distr">
                            <p>Dano:</p>
                            <p id="pDanoT">100%</p>
                        </div>
                        <div class="progress-fundo">
                            <div class="progresso" id="pDano">
                                
                            </div>
                        </div>
                    </div>
                    <div class="pForca">
                        <div class="distr">
                            <p>Força:</p>
                            <p id="pForcaT">100%</p>
                        </div>
                        
                        <div class="progress-fundo">
                            <div class="progresso" id="pForca">
                                
                            </div>
                        </div>
                    </div>
                    <div class="pIntelecto">
                        <div class="distr">
                            <p>Intelecto:</p>
                            <p id="pIntelectoT">100%</p>
                        </div>
                        
                        <div class="progress-fundo">
                            <div class="progresso" id="pIntelecto">
                                
                            </div>
                        </div>
                    </div>
                    <div class="pVigor">
                        <div class="distr">
                            <p>Vigor</p>
                            <p id="pVigorT">100%</p>
                        </div>
                        
                        <div class="progress-fundo">
                            <div class="progresso" id="pVigor">
                                
                            </div>
                        </div>
                    </div>
                    <div class="pArmadura">
                        <div class="distr">
                            <p>Armadura</p>
                            <p id="pArmaduraT">100%</p>
                        </div>
                        
                        <div class="progress-fundo">
                            <div class="progresso" id="pArmadura">
                                
                            </div>
                        </div>
                    </div>
                    <div class="pDurabilidade">
                        <div class="distr">
                            <p>Durabilidade</p>
                            <p id="pDurabilidadeT">100%</p>
                        </div>
                        
                        <div class="progress-fundo">
                            <div class="progresso" id="pDurabilidade">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
        <!-- You can also require other files to run in this process -->
        <!-- <script src="./renderer.js"></script>         -->
    </body>

</html>
