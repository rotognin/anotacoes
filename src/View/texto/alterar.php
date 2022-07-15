<!DOCTYPE html>
<html>
<?php include 'html/head.php'; ?>
<body>
    <div class="container-fluid">
        <?php 
            $titulo = 'Alterar Texto';
            require_once 'html/movimentacao/topo.php';
            require_once 'html/movimentacao/menu.php';
        ?>

        <?php include_once 'html/mensagem.php'; ?>
        <?php 
            $acao = 'atualizar';
            require('formulario.php'); 
        ?>
        <br>
    </div>

    <?php include 'html/js/scriptsjs.php'; ?>
</body>
</html>