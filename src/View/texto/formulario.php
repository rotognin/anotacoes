<form class="col-12" method="post" action="<?php echo $rota($acao, 'texto'); ?>">
    <input type="hidden" name="_token" value="<?php echo $_SESSION['csrf']; ?>">
    
    <div class="form-group">
        <label for="id" style="margin:0px"><b>ID: &nbsp;</b></label><br>
        <input type="number" id="id" name="id" readonly value="<?php echo ($texto->id ?? '0'); ?>">
    </div>
    <div class="form-group">
        <label for="descricao" style="margin:0px"><b>Descrição: &nbsp;</b></label><br>
        <input type="text" id="descricao" name="descricao" value="<?php echo ($texto->descricao ?? ''); ?>" size="60" required autofocus>
    </div>
    <div class="form-group">
        <label for="texto" style="margin:0px"><b>Texto: &nbsp;</b></label><br>
        <textarea id="texto" name="texto" rows="10" cols="80"><?php echo ($texto->texto ?? ''); ?></textarea>
    </div>

    <div class="form-group">
        <?php
            $categoria_id = ($texto->categoria_id ?? 0);
        ?>
        <label for="categoria_id" style="margin:0px"><b>Categoria: &nbsp;</b></label><br>
        <select name="categoria_id" id="categoria_id">
        <?php
            foreach ($categorias as $categoria){
                echo '<option value="' . $categoria->id . '" ';

                if (($texto->categoria_id ?? 0) == $categoria->id){
                    echo ' selected ';
                }

                echo '>' . $categoria->nome . '&nbsp;&nbsp;&nbsp;&nbsp;</option>';
            }
        ?>
        </select>
    </div>

    <div class="form-group">
        <?php
            $prioridade = ($texto->prioridade ?? 1);
        ?>
        <label for="prioridade" style="margin:0px"><b>Prioridade: &nbsp;</b></label><br>
        <select name="prioridade" id="prioridade">
            <option value="1" <?php echo ($prioridade == 1) ? ' selected ' : ''; ?>>Baixa &nbsp;&nbsp;</option>
            <option value="2" <?php echo ($prioridade == 2) ? ' selected ' : ''; ?>>Média &nbsp;&nbsp;</option>
            <option value="3" <?php echo ($prioridade == 3) ? ' selected ' : ''; ?>>Alta &nbsp;&nbsp;</option>
        </select>
    </div>

    <input type="hidden" id="status" name="status" value="<?php echo ($texto->status ?? '0'); ?>">
    <button type="submit" value="<?php echo ucfirst($acao); ?>" class="btn botao"><?php echo ucfirst($acao); ?></button>
</form>