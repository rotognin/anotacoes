<!DOCTYPE html>
<html>
<?php include 'html/head.php'; ?>
<body>
    <div class="container-fluid">
        <?php require_once 'html/movimentacao/topo.php'; ?>
        <?php include('html/mensagem.php'); ?>

        <div class="d-flex align-items-stretch">
            <div class="container">
                <p class="h3">
                    Categorias &nbsp;&nbsp;&nbsp;
                    <span class="badge badge-primary"><?php echo "5"; ?></span>
                    <a data-toggle="tooltip" data-placement="top" title="Nova Categoria" href="<?php echo $rota('novo', 'categoria'); ?>">
                        <span class="badge badge-primary">+</span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Listar Categorias" href="<?php echo $rota('lista', 'categoria'); ?>">
                        <span class="badge badge-primary">*</span>
                    </a>
                </p>
                <hr>
                <div class="container">
                    <p id="categoria_1" data-cat-id="1" onclick="selecionarCategoria(1);" class="categorias selecao">Anotações Gerais</p>
                    <p class="selecao">Finanças</p>
                    <p class="selecao">Senhas e Acessos</p>
                    <p class="selecao">Programação</p>
                    <p class="selecao">Documentos</p>
                </div>
            </div>
            <div class="container">
                <p class="h2">
                    Notas &nbsp;&nbsp;&nbsp;
                    <span class="badge badge-primary"><?php echo "0"; ?></span>
                    <a data-toggle="tooltip" data-placement="top" title="Nova Nota" href="<?php echo $rota('novo', 'anotacao'); ?>">
                        <span class="badge badge-primary">+</span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Listar Notas" href="<?php echo $rota('lista', 'anotacao'); ?>">
                        <span class="badge badge-primary">*</span>
                    </a>
                </p>
                <hr>
                <div class="container">
                    <p class="selecao">Anotações Gerais</p>
                    <p class="selecao">Finanças</p>
                    <p class="selecao">Senhas e Acessos</p>
                    <p class="selecao">Programação</p>
                    <p class="selecao">Documentos</p>
                </div>
            </div>

        </div>


    </div>

    <?php include_once 'html/js/scriptsjs.php'; ?>
    <script src="html/js/script.js"></script>
</body>
</html>