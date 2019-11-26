function carregarInventario(){
    var lista = document.getElementById("listaItens");

    /* Ler Banco de Dados aqui */
    var itens = bancoDeDados();
    
    var anterior = "";
    for (var i = 0; i < itens.length; i++){
        lista.innerHTML = anterior +
        "<li onclick=\"selecionarItem(this, '" + itens[i][1] + "')\">" +
            "<scan class=\"quantia\">" + itens[i][13] + "</scan>" +
            "<scan class=\"preco\">" + itens[i][2] + "</scan>" +
            "<scan class=\"image\"><img src=\"_imagens/" + "MachadodeFogo" + ".png\"></scan>" +
            "<scan class=\"tipo\">" + itens[i][13] + "</scan>" +
        "</li>";
        anterior = lista.innerHTML;
    }

    itens = bancoDeDados2();

    lista = document.getElementById("inventario-esquerdo");
    anterior = "";
      
    for (var i = 0; i < itens.length/2; i++){
        lista.innerHTML = anterior +
        "<li class=\"itensInv cabeca\" id=\"cabeca\" onclick=\"selecionarItem(this, '" + itens[i][1] + "')\">" +
            "<scan class=\"image\"><img src=\"_imagens/EspadaCongelante.png\"></scan>" +
        "</li>";

        anterior = lista.innerHTML;
        
    }
    
    lista = document.getElementById("inventario-direito");
    anterior = "";

    for (var i = itens.length/2; i < itens.length; i++){
        lista.innerHTML = anterior +
        "<li class=\"itensInv cabeca\" id=\"cabeca\" onclick=\"selecionarItem(this, '" + itens[i][1] + "')\">" +
            "<scan class=\"image\"><img src=\"_imagens/EspadaCongelante.png\"></scan>" +
        "</li>";

        anterior = lista.innerHTML;
    }
    
}

function bancoDeDados(){
    // id, nome, tipo, preco_base, dano, forca, intelecto, vigor, armadura, classes, durabilidade, desc, flags
    var result = [ 
    [1,"Machado de Fogo", 0, 1200, 10,10,10,10,10,"Ninja e Guerreiro", 20, 10, "FA", 15],
    [2,"Espada Congelante", 0, 1200, 10,10,10,10,10,"Ninja e Guerreiro", 20, 10, "FA",15],
    [3,"Escudo de Ferro", 0, 1200, 10,10,10,10,10,"Ninja e Guerreiro", 20, 10, "FA",15],
    [4,"Vestido da Morte", 0, 1200, 10,10,10,10,10,"Ninja e Guerreiro", 20, 10, "FA",15],
    [5,"Garra Sombria", 0, 1200, 10,10,10,10,10,"Ninja e Guerreiro", 20, 10, "FA",15],
    [1,"Machado de Fogo", 0, 1200, 10,10,10,10,10,"Ninja e Guerreiro", 20, 10, "FA", 15],
    [2,"Espada Congelante", 0, 1200, 10,10,10,10,10,"Ninja e Guerreiro", 20, 10, "FA",15],
    [3,"Escudo de Ferro", 0, 1200, 10,10,10,10,10,"Ninja e Guerreiro", 20, 10, "FA",15],
    [4,"Vestido da Morte", 0, 1200, 10,10,10,10,10,"Ninja e Guerreiro", 20, 10, "FA",15],
    [5,"Garra Sombria", 0, 1200, 10,10,10,10,10,"Ninja e Guerreiro", 20, 10, "FA",15],
    [1,"Machado de Fogo", 0, 1200, 10,10,10,10,10,"Ninja e Guerreiro", 20, 10, "FA", 15],
    [2,"Espada Congelante", 0, 1200, 10,10,10,10,10,"Ninja e Guerreiro", 20, 10, "FA",15],
    [3,"Escudo de Ferro", 0, 1200, 10,10,10,10,10,"Ninja e Guerreiro", 20, 10, "FA",15],
    [4,"Vestido da Morte", 0, 1200, 10,10,10,10,10,"Ninja e Guerreiro", 20, 10, "FA",15],
    [5,"Garra Sombria", 0, 1200, 10,10,10,10,10,"Ninja e Guerreiro", 20, 10, "FA",15]
    ];

    return result;
}

function bancoDeDados2(){
    // id, nome, tipo, preco_base, dano, forca, intelecto, vigor, armadura, classes, durabilidade, desc, flags
    var result = [ 
    [1,"Machado de Fogo", 0, 1200, 10,10,10,10,10,"Ninja e Guerreiro", 20, 10, "FA", 15],
    [2,"Espada Congelante", 1, 1200, 10,10,10,10,10,"Ninja e Guerreiro", 20, 10, "FA",15],
    [3,"Escudo de Ferro", 2, 1200, 10,10,10,10,10,"Ninja e Guerreiro", 20, 10, "FA",15],
    [4,"Vestido da Morte", 3, 1200, 10,10,10,10,10,"Ninja e Guerreiro", 20, 10, "FA",15],
    [5,"Garra Sombria", 4, 1200, 10,10,10,10,10,"Ninja e Guerreiro", 20, 10, "FA",15],
    [6,"Machado de Fogo", 5, 1200, 10,10,10,10,10,"Ninja e Guerreiro", 20, 10, "FA", 15],
    [7,"Espada Congelante", 6, 1200, 10,10,10,10,10,"Ninja e Guerreiro", 20, 10, "FA",15],
    [8,"Espada Congelante", 7, 1200, 10,10,10,10,10,"Ninja e Guerreiro", 20, 10, "FA",15]
    ];

    return result;
}