function selecionarCategoria(id){
    zerarNotas();
    limparCategorias();

    $("#categoria_" + id).addClass("selecao-click");

    // Pegar o ID da categoria que irá ser carregada
    var categoria_id = parseInt($("#categoria_" + id).data("cat-id"));

    // Requisição para o servidor




}

function zerarNotas(){
    
}

function limparCategorias()
{
    var qtd = parseInt($("#div_categorias").data("qtd-categorias"));

    if (qtd > 0){
        for (id = 1; id <= qtd; id++){
            $("#categoria_" + id).removeClass("selecao-click");
        }
    }
}

function selecionarNota(id)
{
    limparTexto();
    limparNotas();

    $("#nota_" + id).addClass("selecao-click");

    var nota_id = parseInt($("#nota_" + id).data("nota-id"));

    // Requisição para o servidor



    $("#texto").text("Esse texto é bacana rapaz!");
}

function limparNotas()
{
    var qtd = parseInt($("#div_notas").data("qtd-notas"));

    if (qtd > 0){
        for (id = 1; id <= qtd; id++){
            $("#nota_" + id).removeClass("selecao-click");
        }
    }
}

function limparTexto()
{
    $("#texto").text("");
}