<?php

#Classe do cliente que permitirá a realização das opções (cadastro, edição e deleção)
class cliente{

    private $pasta;         #Armazena a pasta onde será salvo o arquivo
    private $arquivo;       #Armazena o nome do arquivo que será criado
    private $pasta_Arquivo; #Armazena o caminho absoluto do arquivo a ser salvo
    private $msg;           #Armazena a mensagem a ser salva no arquivo

    public function __construct($pasta, $arquivo, $texto){
        $this->pasta = $pasta;
        $this->arquivo = $arquivo;
        $this->pasta_Arquivo = $pasta . '/' . $arquivo . '.txt';
        $this->msg = $texto;
    }

    #Cria a pasta para gravar o arquivo
    public function criaPasta(){
        try {
            return !is_dir($this->pasta) ? mkdir($this->pasta, 0777, true) : false; #Cria a pasta dando permissão de leitura e escrita
        } catch (Exception $ex) {
            echo "Erro: " . $ex;
        }
    }

    #Cria ou sobreescreve o arquivo
    public function criaArquivo(){
        try {
            if (!is_dir($this->pasta)) {
                return $this->criaPasta() ? file_put_contents($this->pasta_Arquivo, $this->msg) : false; #Se a pasta é criada com sucesso, salva o arquivo, caso contrário retorna falso
            } else {
                return fopen($this->pasta_Arquivo, "w+") ? file_put_contents($this->pasta_Arquivo, $this->msg) : false; #se a pasta já existir, salva o arquivo, caso contrário retorna falso
            }
        } catch (Exception $ex) {
            echo "Erro: " . $ex;
        }
    }

    #Deleta o arquivo recebido como parâmetro
    public static function deletarArquivo($arquivo){
        return unlink($arquivo);
    }

}

#Recebendo paramentros do $_POST para realizar o cadastro
try {
    if (isset($_POST['codigo']) && !empty($_POST['codigo'])) {
        $pasta = '../clientes/' . $_POST['codigo'];
        $arquivo = $_POST['nomeArquivo'];
        $texto = $_POST['mensagem'];

        #Cria uma instância da classe 'cliente'
        $cliente = new cliente($pasta, $arquivo, $texto);
        $cliente->criaArquivo();
    }
} catch (Exception $ex) {
    echo 'Erro: ' . $ex;
}

#Checa se houve requisição via $_POST e então realiza a deleção do arquivo enviado
try {
    if (isset($_POST['diretorioDelecao']) && !empty($_POST['diretorioDelecao'])) {
        $diretorioDelecao = $_POST['diretorioDelecao'];
        Cliente::deletarArquivo($diretorioDelecao);
    }
} catch (Exception $ex) {
    echo 'Erro: ' . $ex;
}

?>
