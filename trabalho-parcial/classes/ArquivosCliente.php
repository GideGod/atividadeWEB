<?php

#Cria a classe responsável por listar todos os arquivos dos clientes existentes
class ArquivosCliente{

    private $pasta_Clientes = "";

    public function __construct($pasta){
        $this->pasta_Clientes = $pasta;
    }

    #Verifica se um diretório está vazio
    private function diretorioVazio($pasta){
        if (!is_readable($pasta)) {
            return NULL;
        }
        return (count(scandir($pasta)) == 2);
    }

    #Cria uma tabela de arquivos contidos no diretório especificado no construtor da classe
    public function varrerPastas(){

        $tabela = ""; #Armazena a tabela de retorno
        
        $diretorioRaiz = opendir($this->pasta_Clientes); #Abre o diretório especificado pelo construtor

        if ($diretorioRaiz) {
            while ($pastas = readdir($diretorioRaiz)) { #Lê todas as pastas que estão no diretório raiz
                if ($pastas != '.' && $pastas != '..') {
                    if ($this->diretorioVazio($this->pasta_Clientes . $pastas)) { #Verifica se a pasta lida está vazia e a remove
                        rmdir($this->pasta_Clientes . $pastas);
                        continue;
                    }else{
                        $tabela .= $this->listarArquivos($this->pasta_Clientes . $pastas);
                    }
                }
            }
            closedir($diretorioRaiz);
            return $tabela;
        } else {
            return 'Erro ao criar tabela de arquivos!';
        }

    }

    #Lista todos os arquivos presentes na pasta recebida e retorna uma linha de uma tabela
    public function listarArquivos($pasta){

        $linha = ""; #Cria a linha de retorno para a tabela
        $numeroItems = 0; #Utilizado para configurar o atributo 'rowspan' da linha que contiver mais que um arquivo

        $pasta_Clientes = opendir($pasta); #Abre a pasta do cliente

        if ($pasta_Clientes) {
            while ($arquivosCliente = readdir($pasta_Clientes)) { #Lê o arquivo do cliente
                if ($arquivosCliente != '.' && $arquivosCliente != '..') {

                    $urlArquivo = $pasta . '/' . $arquivosCliente; #Cria a URL para download e edição do arquivo
                    $deletaArquivo = '.' . $pasta . '/' . $arquivosCliente; #Cria a URL para a deleção do arquivo

                    if($numeroItems != 0){
                        $linha .= '<tr>';
                    }
                    $linha .= '<td class="nome-arquivo">' . str_replace('.txt', '', basename($arquivosCliente)) . '</td>';
                    $linha .= '<td>' . '<a href="#" onclick=visualizarArquivo("' . $urlArquivo . '","' . str_replace('.txt', '', basename($arquivosCliente)) . '")>Exibir</a>' . '</td>';
                    $linha .= '<td>' . '<a href="index.php?caminhoArquivo=' . $urlArquivo . '">Editar</a>' . '</td>';
                    $linha .= '<td>' . '<a download="' . $arquivosCliente . '" href="' . $urlArquivo . '">Baixar</a>' . '</td>';
                    $linha .= '<td>' . '<a href="#" onclick=deletarArquivo("' . $deletaArquivo . '")>Excluir</a>' . '</td>';
                    if($numeroItems != 0){
                        $linha .= '</tr>';
                    }
                    $numeroItems++;

                }
            }
            closedir($pasta_Clientes);
            if($numeroItems == 1){ #Personaliza o retorno de acordo com o número de arquivos dentro da pasta
                return '<tr>' . '<th>' . basename($pasta) . '</th>' . $linha . '</tr>';
            }else{
                return '<tr>' . '<th rowspan="' . $numeroItems .'">' . basename($pasta) . '</th>' . $linha . '</tr>';
            }
        }else{
            return 'Erro ao ler pasta de cliente!';
        }
        
    }

}

?>
