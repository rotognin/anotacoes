<?php

namespace Src\Model\Entidades;

use CoffeeCode\DataLayer\DataLayer;

class Textos extends DataLayer
{
    public function __construct()
    {
        parent::__construct('textos', ['usuario_id', 'categoria_id', 'texto'], 'id', true);
    }
}