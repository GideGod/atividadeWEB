<?php

#Classe utilizada para criar o formulário de cadastro e edição
class Cadastro{

    private $imprimeFormulario;

    #Construtor da classe
    public function __construct(){
        $this->imprimeFormulario = 
            '<form name="form" action="classes/Cliente.php" method="POST" target="enviado""><p>
                <label for="codigo">Código</label></p>
            {inputCodigo}<p>
                <label for="nome-arquivo">Nome do arquivo</label></p>
            {inputNomeArquivo}<p>
                <label for="mensagem">Texto</label></p>
            {inputMensagem}
            <br />
            {botao}
            {botaoCancelar}
            </form>';
    }

    #Constrói o formulário para cadastro substituindo tags específicas
    public function construirCadastro(){

        $inputCodigo = '<input type="number" min="1" max="999999" name="codigo" id="codigo" class="entrada-dados borda-preta" />';
        $inputNomeArquivo = '<input type="text" name="nomeArquivo" id="nome-arquivo" class="entrada-dados borda-preta" /></p>';
        $inputMensagem = '<textarea name="mensagem" id="mensagem" class="borda-preta"></textarea>';
        $botao = '<input type="button" value="Cadastrar" onclick="validacao();" />';

        $this->imprimeFormulario = str_replace('{inputCodigo}', $inputCodigo, $this->imprimeFormulario);
        $this->imprimeFormulario = str_replace('{inputNomeArquivo}', $inputNomeArquivo, $this->imprimeFormulario);
        $this->imprimeFormulario = str_replace('{inputMensagem}', $inputMensagem, $this->imprimeFormulario);
        $this->imprimeFormulario = str_replace('{botao}', $botao, $this->imprimeFormulario);
        $this->imprimeFormulario = str_replace('{botaoCancelar}', '', $this->imprimeFormulario);

        return $this->imprimeFormulario;

    }

    #Constrói o formulário para edição substituindo tags específicas
    public function editarArquivo($pasta){

        $codigo = str_replace('./clientes/', '', dirname($pasta));
        $nomeArquivo = str_replace('.txt', '', basename($pasta));
        $msg = file_get_contents($pasta, FILE_TEXT);

        $inputCodigo = '<input type="number" min="1" max="999999" name="codigo" id="codigo" class="entrada-dados borda-preta" readonly="true" value="' . $codigo . '"/>';
        $inputNomeArquivo = '<input type="text" name="nomeArquivo" id="nome-arquivo" class="entrada-dados borda-preta" readonly="true" value="' . $nomeArquivo . '"/>';
        $inputMensagem = '<textarea name="mensagem" id="mensagem" class="borda-preta">' . $msg . '</textarea>';
        $botao = '<input type="button" value="Salvar" onclick="validacao();" />';
        $cancelar = '<input type="button" value="Cancelar" onclick=location.href="lista.php" />';

        $this->imprimeFormulario = str_replace('{inputCodigo}', $inputCodigo, $this->imprimeFormulario);
        $this->imprimeFormulario = str_replace('{inputNomeArquivo}', $inputNomeArquivo, $this->imprimeFormulario);
        $this->imprimeFormulario = str_replace('{inputMensagem}', $inputMensagem, $this->imprimeFormulario);
        $this->imprimeFormulario = str_replace('{botao}', $botao, $this->imprimeFormulario);
        $this->imprimeFormulario = str_replace('{botaoCancelar}', $cancelar, $this->imprimeFormulario);

        return $this->imprimeFormulario;

    }

}

?>
