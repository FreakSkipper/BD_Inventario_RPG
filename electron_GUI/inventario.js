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
        // alert(anterior);
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