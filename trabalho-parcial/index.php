<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>ATIVIDADE 01 - 832409</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_padrao.css" />
    <script type="text/javascript" src="javascript/index.js"></script>
</head>

<body>

    <!-- Criaçãocontrução dos menus -->

    <header class="cabecalho">
        <div class="menus">
            <a class="ativo menu-item" href="index.php">Cadastro</a>
            <a class="menu-item" href="tabela.php">Clientes</a>
        </div>
    </header>

    <section class="conteudo">

        <article id="cadastro">

            <div id="formulario">
                <h3><p>Preencha o formulário para realizar o cadastro.</p></h3>

                <!-- Criação do formulário -->

                <?php
                    include_once('classes/Cadastro.php');
                    $Cadastro = new Cadastro();
                    if (isset($_GET['caminhoArquivo']) && !empty($_GET['caminhoArquivo'])) {
                        echo ($Cadastro->editarArquivo($_GET['caminhoArquivo']));
                    } else {
                        echo ($Cadastro->construirCadastro());
                    }
                ?>

                <p id="aviso" class="aviso"></p>
                <p id="recarregar" class="aviso"></p>

                <!-- evitar carregamento da pagina ao enviar o formulario -->

                <iframe name="enviado" frameBorder="0">
                    Navegador não compatível!
                </iframe>

            </div>

        </article>

    </section>


</body>

</html>
