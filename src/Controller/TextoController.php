<?php

namespace Src\Controller;

use Src\Model\Funcoes\Texto;
use Lib\Token;

class TextoController extends Controller
{
    public static function novo()
    {
        Token::criarCsrf();
        parent::view('texto.novo', []);
    }

    public static function textos(array $post, array $get, string $mensagem = '')
    {
        $textos = new Texto();

        if (isset($post['categoria_id'])){
            $categoria_id = filter_var($post['categoria_id'], FILTER_VALIDATE_INT);
        } else {
            $categoria_id = 0;
        }

        if (!$textos->listar($categoria_id, true)){
            $mensagem = $textos->mensagem;
        }

        Token::criarCsrf();
        parent::view('texto.lista', ['textos' => $textos->obter(), 'mensagem' => $mensagem]);
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

        $texto = new Texto();
        if (!$texto->dados($post)){
            Token::criarCsrf();
            parent::view('texto.' . $view, ['mensagem' => $texto->mensagem, 'texto' => $texto->objeto()]);
            exit;
        }

        if ($texto->gravar()){
            self::textos([], [], 'Texto gravado com sucesso.');
        } else {
            Token::criarCsrf();
            parent::view('texto.' . $view, ['mensagem' => $texto->mensagem, 'texto' => $texto->objeto()]);
        }
    }

    public static function alterar(array $post, array $get, string $mensagem = '')
    {
        Token::criarCsrf();
        
        $id = filter_var($post['texto_id'], FILTER_VALIDATE_INT);
        $texto = new Texto();
        $texto->carregar($id);

        parent::view('texto.alterar', ['texto' => $texto->objeto(), 'mensagem' => $mensagem]);
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

        $id = filter_var($post['texto_id'], FILTER_VALIDATE_INT);

        $texto = new Texto();
        $texto->carregar($id);
        $texto->alterarStatus($status);

        self::textos([], []);
    }
}