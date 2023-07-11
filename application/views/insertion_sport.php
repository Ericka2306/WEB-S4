<div class="container mt-5">
    <form action="create_regime" method="POST">
      <div class="form-group">
      <h2>Ajouter un activite sportif</h2>
      <br>
        <label for="nom">Nom :</label>
        <input type="text" class="form-control" id="nom" name="nom" required>
      </div>
      <div class="form-group">
        <label for="duree">Durée :</label>
        <input type="number" class="form-control" id="duree" name="duree" required>
      </div>

      <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
  </div>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>