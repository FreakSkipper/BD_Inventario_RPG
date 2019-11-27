
<?php
    include("php/Conectar.php");            
?>
<!doctype html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css" type="text/css">
        <link rel="stylesheet" href="manutencao.css" type="text/css">
        <title>RPG - Client v1.2</title>
    </head>
    <body>
        <!-- <div id="topBar">
            <div class="infos-program">
                <p class="program-title">RPG - CLIENT v0.1</p>
            </div>
            <div class="infos-user">
                <p class="user-level">Lv. 10</p>
                <p class="user-name">zFightx</p>
                <p class="user-coins">☻ 1000</p>
            </div>
        </div> -->
        <div id="menuBar">
            <ul id="menu" class="menu">
                <li><a href="index.php">Início</a></li>
                <li><a href="loja.php">Loja</a></li>
                <li><a href="inventario.php">Inventário</a></li>
                <li><a href="armazem.php">Armazém</a></li>
            </ul>
        </div>
		<div id="conteudo">
            <div class="box" onclick="surgirJogadores()">
                <p>Jogadores</p>
            </div>
			<div class="box" onclick="sugirItens()">
                <p>Itens</p>
            </div>
		</div>
        <div class="jogadores" id="jogadores">
            <p onclick="fecharJogadores()">Fechar</p>
            <div class="tabelaJ" id="tabelaJ">
                <table class="">
                    <caption class="">Jogadores Cadastrados.</caption>
                    <thead>
                        <tr>
                            <th>Id:</th>
                            <th>Nome:</th>
                            <th>Login:</th>
                            <th>Experiencia:</th>
                            <th>Sexo:</th>
                            <th>Classe:</th>
                            <th>Carteira:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $stmt = $servidor->prepare("SELECT * FROM personagem INNER JOIN usuario ON personagem.id_usuario = usuario.id_usuario");
                            $stmt->setFetchMode(PDO::FETCH_ASSOC);
                            if(!$stmt->execute()){
                                echo "Falha ao carregar as Vendas.";
                            }    
                        
                            $rows = $stmt->fetchAll();
                            foreach ($rows as $r) {
                        ?>
                            
                            <tr>
                            <td class="tId"><?php echo $r['id_personagem']; ?></td>
                            <td class="tNome"><?php echo $r['name']; ?></td>
                            <td class="tLogin"><?php echo $r['login']; ?></td>
                            <td class="tExperiencia"><?php echo $r['experiencia']; ?></td>
                            <td class="tSexo"><?php echo $r['sexo']; ?></td>
                            <td class="tClasse"><?php echo $r['classe']; ?></td>
                            <td class="tCarteira"><?php echo $r['carteira']; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <div class="optJogadores">
                    <p>Adicionar Item à Jogador</p>
                </div>
            </div>
            <div class="formItem" id="formItem">
                <form action="php/SQL_AddItens.php" method="post">
                    <div>
                        <label>Jogador:</label>
                        <select name="listaJogadores">
                        <?php 
                            $stmt = $servidor->prepare("SELECT id_personagem,name FROM personagem");
                            $stmt->setFetchMode(PDO::FETCH_ASSOC);
                            if(!$stmt->execute()){
                                echo "Falha ao carregar as Vendas.";
                            }    
                        
                            $rows = $stmt->fetchAll();
                            foreach ($rows as $r) {
                        ?>
                            <option value="<?php echo $r['id_personagem'] ?>"><?php echo $r['name'] ?></option>
                        <?php 
                            }
                        ?>
                        </select>
                    </div>
                    <div>
                        <label>Item:</label>
                        <select name="listaItens">
                        <?php 
                            $stmt = $servidor->prepare("SELECT id_item, nome, tipo FROM item");
                            $stmt->setFetchMode(PDO::FETCH_ASSOC);
                            if(!$stmt->execute()){
                                echo "Falha ao carregar as Vendas.";
                            }    
                        
                            $rows = $stmt->fetchAll();
                            foreach ($rows as $r) {
                        ?>
                            <option value="<?php echo $r['id_item'] ?>"><?php echo $r['nome']?> : <?php echo $r['tipo']?></option>
                        <?php 
                            }
                        ?>
                        </select>
                    </div>
                    <div>
                        <label for="qtd">Quantidade:</label>
                        <input type="number" name="qtd" id="qtd" min="0" />
                    </div>
                    <button type="submit" class="">Adicionar</button>
                    <!-- <div>
                        <label for="email">E-mail:</label>
                        <input type="email" id="email" />
                    </div>
                    <div>
                        <label for="msg">Mensagem:</label>
                        <textarea id="msg"></textarea>
                    </div> -->
                </form>
            </div>
            
        </div>
        <div class="itens" id="itens">
            <p onclick="fecharItens()">Fechar</p>
            <div class="tabelaI" id="tabelaI">
                <table class="">
                    <caption class="">Itens Cadastrados.</caption>
                    <thead>
                        <tr>
                            <th>Id:</th>
                            <th>Nome:</th>
                            <th>Preço B:</th>
                            <th>Dano:</th>
                            <th>Força:</th>
                            <th>Intelecto:</th>
                            <th>Vigor:</th>
                            <th>Armadura:</th>
                            <th>Tipo:</th>
                            <th>Classes:</th>
                            <th>Durabilidade:</th>
                            <th>Peso:</th>
                            <th>Desc:</th>
                            <th>Flags:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $stmt = $servidor->prepare("SELECT * FROM item INNER JOIN tipo_item ON item.tipo = tipo_item.id");
                            $stmt->setFetchMode(PDO::FETCH_ASSOC);
                            if(!$stmt->execute()){
                                echo "Falha ao carregar as Vendas.";
                            }    
                        
                            $rows = $stmt->fetchAll();
                            foreach ($rows as $r) {
                        ?>
                            
                            <tr>
                            <td class="tIdI"><?php echo $r['id_item']; ?></td>
                            <td class="tNomeI pad"><?php echo $r['nome']; ?></td>
                            <td class="tPreco pad"><?php echo $r['preco_base']; ?></td>
                            <td class="tNome pad"><?php echo $r['dano']; ?></td>
                            <td class="tNome pad"><?php echo $r['forca']; ?></td>
                            <td class="tNome pad"><?php echo $r['intelecto']; ?></td>
                            <td class="tNome pad"><?php echo $r['vigor']; ?></td>
                            <td class="tNome pad"><?php echo $r['armadura']; ?></td>
                            <td class="tNome pad"><?php echo $r['tipo']; ?></td>
                            <td class="tNome pad"><?php echo $r['classes']; ?></td>
                            <td class="tNome pad"><?php echo $r['durabilidade']; ?></td>
                            <td class="tNome pad"><?php echo $r['peso']; ?></td>
                            <td class="tNome pad"><?php echo $r['desc']; ?></td>
                            <td class="tNome pad"><?php echo $r['flags']; ?></td>
                            
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <div class="optJogadores">
                    <p>Adicionar Item Novo</p>
                </div>
            </div>
            <div class="formItem" id="formItem">
                <form action="php/SQL_AddNewItem.php" method="post">
                    <div>
                        <label>Nome Item:</label>
                        <input type="text" name="nomeI" id="nomeI" />
                    </div>
                    <div>
                        <label for="precoB">Preço Base:</label>
                        <input type="number" name="precoB" id="precoB" min="0" />
                    </div>
                    <div>
                        <label for="dano">Dano:</label>
                        <input type="number" name="dano" id="dano" min="0" />
                    </div>
                    <div>
                        <label for="forca">Força:</label>
                        <input type="number" name="forca" id="forca" min="0" />
                    </div>
                    <div>
                        <label for="intelecto">Intelecto:</label>
                        <input type="number" name="intelecto" id="intelecto" min="0" />
                    </div>
                    <div>
                        <label for="vigor">Vigor:</label>
                        <input type="number" name="vigor" id="vigor" />
                    </div>
                    <div>
                        <label for="armadura">Armadura:</label>
                        <input type="number" name="armadura" id="armadura" min="0" />
                    </div>
                    <div>
                        <label for="tipo">Tipo:</label>
                        <input type="number" name="tipo" id="tipo" min="0" />
                    </div>
                    <div>
                        <label for="classes">Classes:</label>
                        <input type="text" name="classes" id="classes" />
                    </div>
                    <div>
                        <label for="durabilidade">Durabilidade:</label>
                        <input type="number" name="durabilidade" id="durabilidade" min="0" />
                    </div>
                    <div>
                        <label for="peso">Peso:</label>
                        <input type="number" name="peso" id="peso" min="0" />
                    </div>
                    <div>
                        <label for="descricao">Descrição:</label>
                        <input type="text" name="descricao" id="descricao"/>
                    </div>
                    <div>
                        <label for="flags">Flags:</label>
                        <input type="text" name="flags" id="flags"/>
                    </div>
                    <button type="submit" class="">Adicionar</button>
                    <!-- <div>
                        <label for="email">E-mail:</label>
                        <input type="email" id="email" />
                    </div>
                    <div>
                        <label for="msg">Mensagem:</label>
                        <textarea id="msg"></textarea>
                    </div> -->
                </form>
            </div>
            
        </div>
        <!-- You can also require other files to run in this process -->
        <!-- <script src="./renderer.js"></script>         -->
    </body>
    <script>
        function surgirJogadores(){
            document.getElementById("jogadores").style.display = "block";
            document.getElementById("conteudo").style.opacity = "0.2";
        }
        function fecharJogadores(){
            document.getElementById("jogadores").style.display = "none";
            document.getElementById("conteudo").style.opacity = "1";
        }
        function sugirItens(){
            document.getElementById("itens").style.display = "block";
            document.getElementById("conteudo").style.opacity = "0.2";
        }
        function fecharItens(){
            document.getElementById("itens").style.display = "none";
            document.getElementById("conteudo").style.opacity = "1";
        }
    </script>
</html>
