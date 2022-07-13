<!DOCTYPE html>
<html>
<?php include 'html/head.php'; ?>
<body>
    <div class="container-fluid">
        <?php 
            $titulo = 'Textos';
            require_once 'html/movimentacao/topo.php';
            require_once 'html/movimentacao/menu.php';
        ?>
    </div>
    
    <div class="container-fluid">
        <a class="btn fundo-azul text-white" href="<?php echo $rota('novo', 'texto'); ?>">Nova Nota</a>

        <table class="table table-hover table-sm">
            <thead class="fundo-azul branco">
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Categoria</th>
                    <th>Prioridade</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
                if ($textos){
                    foreach($textos as $texto){
                        $acao = (STATUS[$texto->status] == 'Ativo') ? 'inativar' : 'ativar';

                        echo '<tr>';
                            echo '<td>' . $texto->id . '</td>';
                            echo '<td>' . $texto->descricao . '</td>';
                            echo '<td>' . $texto->categoria->nome . '</td>';
                            echo '<td>' . PRIORIDADE[$texto->categoria->prioridade] . '</td>';
                            echo '<td>' . STATUS[$texto->categoria->status] . '</td>';

                            echo '<td>';
                                echo '<form method="post" action="' . $rota('alterar', 'texto') . '">';
                                    echo '<input type="hidden" name="_token" value="' . $_SESSION['csrf'] . '">';
                                    echo '<input type="hidden" name="texto_id" value="' . $texto->id . '">';
                                    echo '<input type="submit" style="margin-left: 10px" value="Alterar" class="btn botao btn-sm float-left">';
                                echo '</form>';
                            echo '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr>';
                        echo '<td colspan="6"><i>Nenhum texto cadastrado...</i></td>';
                    echo '</tr>';
                }
            ?>
            </tbody>
        </table>
    </div>

    <?php include 'html/js/scriptsjs.php'; ?>
</body>
</html>