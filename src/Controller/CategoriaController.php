<?php

namespace Src\Controller;

use Src\Model\Funcoes\Categoria;
use Lib\Token;

class CategoriaController extends Controller
{
    public static function novo()
    {
        Token::criarCsrf();
        parent::view('categoria.novo', []);
    }

    public static function categorias(array $post, array $get, string $mensagem = '')
    {
        $categorias = new Categoria();
        if (!$categorias->listar()){
            $mensagem = $categorias->mensagem;
        }

        Token::criarCsrf();
        parent::view('categoria.lista', ['categorias' => $categorias->obter(), 'mensagem' => $mensagem]);
    }

    public static function gravar(array $post, array $get)
    {
        self::persistir($post, $get, true);
    }

    public static function atualizar(array $post, array $get)
    {
        self::persistir($post, $get, false);
    }

    private static function persistir(array $post, array $get, bool $novo)
    {
        if (!Token::valido($post)){
            parent::logout();
            exit;
        }

        $view = ($novo) ? 'novo' : 'alterar';

        $categoria = new Categoria();
        if (!$categoria->dados($post)){
            Token::criarCsrf();
            parent::view('categoria.' . $view, ['mensagem' => $categoria->mensagem, 'categoria' => $categoria->objeto()]);
            exit;
        }

        if ($categoria->gravar()){
            self::categorias([], [], 'Categoria gravada com sucesso.');
        } else {
            Token::criarCsrf();
            parent::view('categoria.' . $view, ['mensagem' => $categoria->mensagem, 'categoria' => $categoria->objeto()]);
        }
    }

    public static function alterar(array $post, array $get, string $mensagem = '')
    {
        Token::criarCsrf();
        
        $id = filter_var($post['categoria_id'], FILTER_VALIDATE_INT);
        $categoria = new Categoria();
        $categoria->carregar($id);

        parent::view('categoria.alterar', ['categoria' => $categoria->objeto(), 'mensagem' => $mensagem]);
    }

    public static function ativar(array $post, array $get)
    {
        self::alterarStatus($post, $get, 0);
    }

    public static function inativar(array $post, array $get)
    {
        self::alterarStatus($post, $get, 1);
    }

    private static function alterarStatus(array $post, array $get, int $status)
    {
        if (!Token::valido($post)){
            parent::logout();
            exit;
        }

        $id = filter_var($post['categoria_id'], FILTER_VALIDATE_INT);

        $categoria = new Categoria();
        $categoria->carregar($id);
        $categoria->alterarStatus($status);

        self::categorias([], []);
    }
}