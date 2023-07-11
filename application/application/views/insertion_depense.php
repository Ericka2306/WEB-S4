<div class="container mt-5">
    <form action="create_depense" method="POST">
      <div class="form-group">
      <h2>Ajouter un depense</h2>
      <br>
        <label for="date_depense">Date :</label>
        <input type="date" class="form-control" id="date_depense" name="date_depense" required>
      </div>
      <div class="form-group">
        <label for="designation">Designation :</label>
        <input type="text" class="form-control" id="designation" name="designation" required>
      </div>
      <div class="form-group">
        <label for="prixunitaire">Prix unitaire :</label>
        <input type="number" class="form-control" id="prixunitaire" name="prixunitaire" required>
      </div>
      <div class="form-group">
        <label for="quantite">Quantité :</label>
        <input type="number" class="form-control" id="quantite" name="quantite" required>
      </div>
      <button type="submit" class="btn btn-primary">Ajouter</button>

    </form>
    <a href="<?php echo base_url('StatController/liste_depense'); ?>">Listes depenses</a>

  </div>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>