<div class="container mt-5">
    <form action="create_plat" method="POST" enctype="multipart/form-data">
      <div class="form-group">
      <h2>Ajouter un plat</h2>
      <br>
        <label for="nom">Nom :</label>
        <input type="text" class="form-control" id="nom" name="nom" required>
      </div>
      <div class="form-group">
        <label for="sary">Sary :</label>
        <input type="file" class="form-control" id="sary" name="image" size="20" required>
      </div>

      <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
  </div>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  