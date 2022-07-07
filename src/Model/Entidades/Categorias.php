<?php

namespace Src\Model\Entidades;

use CoffeeCode\DataLayer\DataLayer;

class Categorias extends DataLayer
{
    public function __construct()
    {
        parent::__construct('categorias', ['usuario_id', 'nome', 'status', 'prioridade'], 'id', true);
    }
}