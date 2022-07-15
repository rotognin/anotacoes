<!DOCTYPE html>
<html>
<?php include 'html/head.php'; ?>
<body>
    <div class="container-fluid">
        <?php 
            $titulo = 'Categorias';
            require_once 'html/movimentacao/topo.php';
            require_once 'html/movimentacao/menu.php';
        ?>
    </div>
    
    <div class="container-fluid">
        <a class="btn fundo-azul text-white" href="<?php echo $rota('novo', 'categoria'); ?>">Nova Categoria</a>

        <table class="table table-hover table-sm">
            <thead class="fundo-azul branco">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Prioridade</th>
                    <th>Notas</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
                if ($categorias){
                    foreach($categorias as $categoria){
                        $acao = (STATUS[$categoria->status] == 'Ativo') ? 'inativar' : 'ativar';

                        echo '<tr>';
                            echo '<td>' . $categoria->id . '</td>';
                            echo '<td>' . $categoria->nome . '</td>';
                            echo '<td>' . $categoria->descricao . '</td>';
                            echo '<td>' . PRIORIDADE[$categoria->prioridade] . '</td>';
                            echo '<td>' . $categoria->qtd_textos . '</td>';

                            echo '<td>';
                                echo '<form method="post" action="index.php?control=categoria&action=' . $acao . '">';
                                    echo '<input type="hidden" name="_token" value="' . $_SESSION['csrf'] . '">';
                                    echo '<input type="hidden" name="categoria_id" value="' . $categoria->id . '">';
                                    echo STATUS[$categoria->status] . '&nbsp;&nbsp;&nbsp;';
                                    echo '<input type="submit" style="margin-left: 10px" value="' . ucfirst($acao) . '" class="btn botao btn-sm">';
                                echo '</form>';
                            echo '</td>';
                            
                            echo '<td>';
                                echo '<form method="post" action="index.php?control=categoria&action=alterar">';
                                    echo '<input type="hidden" name="_token" value="' . $_SESSION['csrf'] . '">';
                                    echo '<input type="hidden" name="categoria_id" value="' . $categoria->id . '">';
                                    echo '<input type="submit" style="margin-left: 10px" value="Alterar" class="btn botao btn-sm float-left">';
                                echo '</form>';
                            echo '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr>';
                        echo '<td colspan="7"><i>Nenhuma categoria cadastrada...</i></td>';
                    echo '</tr>';
                }
            ?>
            </tbody>
        </table>
    </div>

    <?php include 'html/js/scriptsjs.php'; ?>
</body>
</html>