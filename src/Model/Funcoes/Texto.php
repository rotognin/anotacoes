<?php

namespace Src\Model\Funcoes;

use Src\Model\Entidades\Textos;
use Lib\Funcoes;

class Texto
{
    public string $mensagem;
    private array $textos;
    private Textos $texto;
    private bool $novo;

    public function __construct()
    {
        $this->mensagem = '';
        $this->novo = false;
    }

    public function listar(int $categoria_id = 0, bool $todos = true)
    {
        $params = '&usuario_id=' . $_SESSION['usuID'];
        $find = 'usuario_id = :usuario_id';

        if ($categoria_id > 0){
            $params .= '&categoria_id=' . $categoria_id;
            $find .= ' AND categoria_id = :categoria_id';
        }

        if (!$todos){
            $params .= '&status=0';
            $find .= ' AND status = :status';
        }

        $textos = (new Textos())->find($find, $params)->order("prioridade DESC")->fetch(true);

        if (!$textos){
            $this->mensagem = 'Nenhuma nota cadastrada.';
            return false;
        }

        $this->textos = $textos;
        return true;
    }

    public function carregar(int $id)
    {
        $this->texto = (new Textos())->findById($id);
    }

    public function obter()
    {
        return $this->textos ?? false;
    }

    public function objeto()
    {
        return $this->texto ?? false;
    }

    private function validarCampos(): bool
    {
        $retorno = true;
        $this->mensagem = '';

        if ($this->texto->descricao == ''){
            $this->mensagem .= 'Informe a Descrição do texto <br>';
            $retorno = false;
        }

        if ($this->texto->texto == ''){
            $this->mensagem .= 'Informe o Texto a ser gravado <br>';
            $retorno = false;
        }

        if (!$retorno){
            $this->mensagem = substr($this->mensagem, 0, -4);
        }

        return $retorno;
    }

    /**
     * Verificar os dados que vieram do formulário
     */
    public function dados(array $dados)
    {
        if ($dados['id'] > 0){
            $this->carregar($dados['id']);
        } else {
            $this->texto = new Textos();
            $this->novo = true;
        }

        $this->texto->usuario_id = $_SESSION['usuID'];
        $this->texto->categoria_id = filter_var($dados['categoria_id'], FILTER_VALIDATE_INT);
        $this->texto->descricao = Funcoes::verificarString($dados['descricao']);
        $this->texto->texto = Funcoes::verificarString($dados['texto']);
        $this->texto->prioridade = filter_var($dados['prioridade'], FILTER_VALIDATE_INT);

        if ($this->novo){
            $this->texto->status = 0;
        }

        if (!$this->validarCampos()){
            return false;
        }

        return true;
    }

    public function gravar()
    {
        if (!$this->texto->save()){
            $this->mensagem = $this->texto->fail()->getMessage();
            return false;
        }

        return true;
    }

    public function alterarStatus(int $status)
    {
        $this->texto->status = $status;
        $this->gravar();
    }


}