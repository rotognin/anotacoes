<?php

namespace Src\Model\Funcoes;

use Src\Model\Entidades\Categorias;
use Lib\Funcoes;

class Categoria
{
    public string $mensagem;
    private array $categorias;
    private Categorias $categoria;
    private bool $novo;

    public function __construct()
    {
        $this->mensagem = '';
        $this->novo = false;
    }

    public function listar(bool $todos = true)
    {
        $params = 'usuario_id=' . $_SESSION['usuID'];
        $find = 'usuario_id = :usuario_id';

        if (!$todos){
            $params = '&status=0';
            $find = ' AND status = :status';
        }

        $categorias = (new Categorias())->find($find, $params)->fetch(true);

        if (!$categorias){
            $this->mensagem = 'Nenhuma categoria cadastrada.';
            return false;
        }

        $this->categorias = $categorias;
        return true;
    }

    public function carregar(int $id)
    {
        $this->categoria = (new Categorias())->findById($id);
    }

    public function obter()
    {
        return $this->categorias ?? false;
    }

    public function objeto()
    {
        return $this->categoria ?? false;
    }

    private function validarCampos(): bool
    {
        $retorno = true;
        $this->mensagem = '';

        if ($this->categoria->nome == ''){
            $this->mensagem .= 'Informe o Nome da categoria <br>';
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
            $this->categoria = new Categorias();
            $this->novo = true;
        }

        $this->categoria->nome = Funcoes::verificarString($dados['nome']);
        $this->categoria->descricao = Funcoes::verificarString($dados['descricao']);
        $this->categoria->prioridade = filter_var($dados['prioridade'], FILTER_VALIDATE_INT);
        $this->categoria->usuario_id = $_SESSION['usuID'];

        if ($this->novo){
            $this->categoria->status = 0;
        }

        if (!$this->validarCampos()){
            return false;
        }

        return true;
    }

    public function gravar()
    {
        if (!$this->categoria->save()){
            $this->mensagem = $this->categoria->fail()->getMessage();
            return false;
        }

        return true;
    }

    public function alterarStatus(int $status)
    {
        $this->categoria->status = $status;
        $this->gravar();
    }
}