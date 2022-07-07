<?php

namespace Src\Controller;

use Src\Model\Funcoes\Movimentacoes;
use Lib\Token;

class AdministracaoController extends Controller
{
    public static function inicio(array $post, array $get, string $mensagem = '')
    {
        if (!Token::valido($post)){
            parent::logout();
            exit;
        }

        parent::view('admin.index', ['mensagem' => $mensagem]);
    }
}