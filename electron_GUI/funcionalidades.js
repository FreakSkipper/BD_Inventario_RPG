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