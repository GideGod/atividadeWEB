<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>ATIVIDADE 01 - 832409</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_padrao.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="javascript/tabela.js"></script>
</head>

<body>

    <!-- contrução dos menus -->

    <header class="cabecalho">
        <div class="menus">
            <a class="menu-item" href="index.php">Cadastrar</a>
            <a class="ativo menu-item" href="tabela.php">Clientes</a>
        </div>
    </header>

    <section class="conteudo">

        <article id="clientes">

            <div id="lista-clientes">
                <br>
                <table>
                    <tbody>

                        <!-- contrução das tabelas -->

                        <tr>
                            <th>Código</th>
                            <th>Arquivo</th>
                            <th colspan="4">Opções</th>
                        </tr>

                        <?php
                            include_once('classes/ArquivosCliente.php');
                            $ArquivosCliente = new ArquivosCliente('./clientes/');
                            echo $ArquivosCliente->varrerPastas();
                        ?>

                    </tbody>
                </table>
            </div>

            <div class="exibir-arquivo" id="exibir-arquivo">
                <h2 class="nome-arquivo" id="nome-arquivo"></h2>
                <div class="arquivo" id="arquivo">
                    <p class="conteudo-arquivo" id="conteudo-arquivo"></p>
                </div>
                <a href="#" onclick="fecharArquivo()">Fechar</a>
            </div>

        </article>

    </section>



</body>

</html>
