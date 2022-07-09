<form class="col-12" method="post" action="<?php echo $rota($acao, 'categoria'); ?>">
    <input type="hidden" name="_token" value="<?php echo $_SESSION['csrf']; ?>">
    
    <div class="form-group">
        <label for="id" style="margin:0px"><b>ID: &nbsp;</b></label><br>
        <input type="number" id="id" name="id" readonly value="<?php echo ($categoria->id ?? '0'); ?>">
    </div>
    <div class="form-group">
        <label for="nome" style="margin:0px"><b>Nome: &nbsp;</b></label><br>
        <input type="text" id="nome" name="nome" value="<?php echo ($categoria->nome ?? ''); ?>" size="60" required autofocus>
    </div>
    <div class="form-group">
        <label for="descricao" style="margin:0px"><b>Descrição: &nbsp;</b></label><br>
        <input type="text" id="descricao" name="descricao" value="<?php echo ($categoria->descricao ?? ''); ?>" size="100">
    </div>

    <div class="form-group">
        <?php
            $prioridade = ($categoria->prioridade ?? 1);
        ?>
        <label for="prioridade" style="margin:0px"><b>Prioridade: &nbsp;</b></label><br>
        <select name="prioridade" id="prioridade">
            <option value="1" <?php echo ($prioridade == 1) ? ' selected ' : ''; ?>>Baixa &nbsp;&nbsp;</option>
            <option value="2" <?php echo ($prioridade == 2) ? ' selected ' : ''; ?>>Média &nbsp;&nbsp;</option>
            <option value="3" <?php echo ($prioridade == 3) ? ' selected ' : ''; ?>>Alta &nbsp;&nbsp;</option>
        </select>
    </div>

    <input type="hidden" id="status" name="status" value="<?php echo ($categoria->status ?? '0'); ?>">
    <button type="submit" value="<?php echo ucfirst($acao); ?>" class="btn botao"><?php echo ucfirst($acao); ?></button>
</form>