<!DOCTYPE html>
<html>
<?php include 'html/head.php'; ?>
<body>
    <div class="container-fluid">
        <?php 
            $titulo = 'Novo Texto';
            require_once 'html/movimentacao/topo.php';
            require_once 'html/movimentacao/menu.php';
        ?>

        <br>
        <?php include_once 'html/mensagem.php'; ?>
        <?php 
            $acao = 'gravar';
            require('formulario.php'); 
        ?>
    </div>

    <?php include 'html/js/scriptsjs.php'; ?>
</body>
</html>