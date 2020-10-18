/* deleção de arquivo e confirmação */

function deletarArquivo(caminhoArquivo) {

    if (confirm("Tem certeza que deseja excluir?")) {

        /* Envia via POST uma requisição de deleção para a classe Cliente */
        $.ajax({
            url: "classes/Cliente.php",
            type: "post",
            data: { diretorioDelecao: caminhoArquivo },
            success: function sucesso() {
                alert("Arquivo excluido com sucesso!");
            },
            error: function erro() {
                alert("Erro ao excluir arquivo!")
            },
        });

        window.location.reload(1);

    } else {
        alert("Exclusão cancelada!");
    }

}

/* exibição dos arquivos */

function visualizarArquivo(caminhoArquivo, nomeArquivo) {

    var exibir_arquivo = document.getElementById("exibir-arquivo");
    var nome_arquivo = document.getElementById("nome-arquivo");
    var conteudo_arquivo = document.getElementById("conteudo-arquivo");

    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function () {
        nome_arquivo.innerHTML = nomeArquivo;
        conteudo_arquivo.innerHTML = ajax.responseText;
    }
    ajax.open("POST", caminhoArquivo);
    ajax.send(null);

    exibir_arquivo.style.display = "block";

}

function fecharArquivo() {

    var exibirArquivo = document.getElementById("exibir-arquivo");
    var nomeArquivo = document.getElementById("nome-arquivo");
    var conteudoArquivo = document.getElementById("conteudo-arquivo");

    nomeArquivo.innerHTML = "";
    conteudoArquivo.innerHTML = "";
    exibirArquivo.style.display = "none";

}
