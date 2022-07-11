<?php

namespace Src\Controller;

use Src\Model\Funcoes\Categoria;

class MovimentacaoController extends Controller
{
    public static function inicio(array $post, array $get, string $mensagem = '')
    {
        // Carregar as categorias do usuário logado
        $categorias = new Categoria();
        $categorias->listar(false);

        parent::view('movimentacao.index', ['categorias' => $categorias->obter(), 'mensagem' => $mensagem]);
    }
}