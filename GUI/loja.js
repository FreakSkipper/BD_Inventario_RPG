var data = ({
    client: 'mysql',
    connection:{
        host: 'localhost',
        user: 'root',
        password: null,
        database: 'rpg'
    }
});

var connection = require('knex')(data);

if(connection) console.log("Conexao com Banco de Dados Sucedida!");


function carregarLoja(){
    var lista = document.getElementById("itensLoja");

    /* Ler Banco de Dados aqui */
    var itens = bancoDeDados();
    
    var anterior = "";
    for (var i = 0; i < itens.length; i++){
        lista.innerHTML = anterior +
        "<li onclick=\"selecionarItem(this, '" + itens[i][1] + "')\">" +
            "<scan class=\"quantia\">" + itens[i][13] + "</scan>" +
            "<scan class=\"preco\">" + itens[i][3] + "</scan>" +
            "<scan class=\"image\"><img src=\"_imagens/" + "MachadodeFogo" + ".png\"></scan>" +
            "<scan class=\"tipo\">" + itens[i][13] + "</scan>" +
            "<scan class=\"sumir dano\">" + itens[i][4] + "</scan>" +
            "<scan class=\"sumir forca\">" + itens[i][5] + "</scan>" +
            "<scan class=\"sumir intelecto\">" + itens[i][6] + "</scan>" +
            "<scan class=\"sumir vigor\">" + itens[i][7] + "</scan>" +
            "<scan class=\"sumir armadura\">" + itens[i][8] + "</scan>" +
            "<scan class=\"sumir durabilidade\">" + itens[i][9] + "</scan>" +
        "</li>";
        anterior = lista.innerHTML;
    }

    var result = connection('armazem')
        .select('*')
        .then((response) => {
            console.log(response);
        })
        .catch((erro) => {
            console.log("Erro na leitura do Armazem: ", erro);
            return;
        });
    alert(result);
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
    [5,"Garra Sombria", 0, 1200, 10,10,10,10,10,"Ninja e Guerreiro", 20, 10, "FA",15],
    [5,"Arara Sombria", 0, 1200, 10,10,10,10,10,"Ninja e Guerreiro", 20, 10, "FA",15],
    [5,"Arara Sombria", 0, 1200, 10,10,10,10,10,"Ninja e Guerreiro", 20, 10, "FA",15]
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

async function bda(){
    var result;

    await db('armazem')
        .select('*')
        .then((response) => {
            result = response;
        })
        .catch((erro) => {
            console.log("Erro na leitura do Armazem: ", erro);
            return;
        });

    return result;
}