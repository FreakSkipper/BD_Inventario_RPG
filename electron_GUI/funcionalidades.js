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

function myfuc(){
    
}