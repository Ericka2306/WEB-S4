<form action="<?php echo site_url('Control_code/confirmer')?>" method="post" >
 <label for="code">Confirmer un code :</label>
    <select name="code" id="code">
        <?php foreach ($code as $code): ?>
            <option value="<?php echo $code->id; ?>"> code:<?php echo $code->id_code; ?> _user:<?php echo $code->id_user; ?></option>
        <?php endforeach; ?>
    </select>

    <br><br>

    <input type="submit" value="Enregistrer">
</form>