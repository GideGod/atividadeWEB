/* validação do formulário */

/* validação código do cliente */
function validarCodigo() {

    var codigo = document.form.codigo;
    var aviso = document.getElementById("aviso");

    if (codigo.value == "" || codigo.value > 999999999 || codigo == 0) {
        aviso.innerHTML = "ERRO!!! valido entre '1' e '999999999'.</br>Tente novamente!";
        aviso.style.display = "block";
        codigo.className = "entrada-dados borda-vermelha";
        return false;
    } else {
        aviso.innerHTML = "";
        aviso.style.display = "none";
        codigo.className = "entrada-dados borda-azul";
        return true;
    }

}

/* validação do nome de arquivo */
function validarNomeArquivo() {

    var nomeArquivo = document.form.nomeArquivo;
    var aviso = document.getElementById("aviso");

    if (nomeArquivo.value == "") {
        aviso.innerHTML = "ERRO!!! Digite o nome do arquivo!";
        aviso.style.display = "block";
        nomeArquivo.className = "entrada-dados borda-vermelha";
        return false;
    } else {
        aviso.innerHTML = "";
        aviso.style.display = "none";
        nomeArquivo.className = "entrada-dados borda-azul";
        return true;
    }

}

/* validação do campo de mensagem */
function validarMensagem() {

    var mensagem = document.form.mensagem;
    var aviso = document.getElementById("aviso");

    if (mensagem.value == "") {
        aviso.innerHTML = "ERRO!!! Digite uma mensagem!";
        aviso.style.display = "block";
        mensagem.className = "borda-vermelha";
        return false;
    } else {
        aviso.innerHTML = "";
        aviso.style.display = "none";
        mensagem.className = "borda-azul";
        return true;
    }

}

/* Validação do formulário */
function validacao() {

    /* Capturando variáveis */
    var aviso = document.getElementById("aviso");
    var codigo = document.form.codigo;
    var nomeArquivo = document.form.nomeArquivo;
    var mensagem = document.form.mensagem;

    /* validação dos campos, para ver se estão preenchidos e no intervalo correto */
    if (validarCodigo() && validarNomeArquivo() && validarMensagem()) {

        var segundos = 0;
        var recarregar = document.getElementById("recarregar");

        aviso.innerHTML = "Formulário enviado com sucesso!";
        aviso.style.display = "block";
        recarregar.style.display = "block";
        codigo.className = "entrada-dados borda-azul";
        nomeArquivo.className = "entrada-dados borda-azul";
        mensagem.className = "borda-azul";

        document.form.submit();
        document.form.codigo.value = "";
        document.form.nomeArquivo.value = "";
        document.form.mensagem.value = "";

        setTimeout(function () {
            window.location.href = "./index.php";
        }, 5000);

        return true;

    } else {
        return false;
    }

}
