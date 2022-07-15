<?php

namespace Src\Controller;

use Src\Model\Funcoes\Categoria;
use Lib\Token;

class MovimentacaoController extends Controller
{
    public static function inicio(array $post, array $get, string $mensagem = '')
    {
        // Carregar as categorias do usuário logado
        $categorias = new Categoria();
        if ($categorias->listar(false)){
            $categorias->quantidadeNotas();
        }

        Token::criarCsrf();
        parent::view('movimentacao.index', ['categorias' => $categorias->obter(), 'mensagem' => $mensagem]);
    }
}