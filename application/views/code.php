<form action="<?php echo site_url('Control_code/reserver')?>" method="post" >
<h3>Porte monnaie:<?php echo $utilisateur->caisse ?></h3>
 <label for="code">Choisir un code :</label>
    <select name="code" id="code">
        <?php foreach ($code as $code): ?>
            <option value="<?php echo $code->id; ?>"><?php echo $code->code; ?></option>
        <?php endforeach; ?>
    </select>

    <br><br>

    <input type="submit" value="Enregistrer">
</form>