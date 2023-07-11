<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription - Thème Noir</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    body {
      background-color: #333;
      color: #fff;
      min-height: 100vh;
      display: flex;
      align-items: center;
    }

    .login-form {
      max-width: 400px;
      margin: 0 auto;
      background-color: #222;
      padding: 30px;
      border-radius: 5px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
    }

    .login-form h2 {
      text-align: center;
      margin-bottom: 30px;
      font-family: 'Segoe UI', sans-serif;
      color: #fff;
    }

    .login-form .form-control {
      background-color: #333;
      border: none;
      border-bottom: 2px solid #777;
      border-radius: 0;
      padding-left: 0;
      color: #fff;
    }

    .login-form .form-control:focus {
      box-shadow: none;
      border-color: #f00;
    }

    .login-form .btn-primary {
      background-color: green;
      border-color: green;
      border-radius: 20px;
      padding: 10px 20px;
      width: 100%;
    }

    .login-form .btn-primary:hover {
      background-color: #fff;
      color: green;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="login-form">
          <h2 class="mb-4"><i class="fas fa-user-plus mr-2"></i> Inscription</h2>
          <form action="inscriptionInfo" method="POST">
            <div class="form-group">
              <label for="nom"><i class="fas fa-user mr-2"></i> Nom :</label>
              <input type="text" class="form-control" id="nom" placeholder="Nom" name="nom" required>
            </div>
            <div class="form-group">
              <label><i class="fas fa-venus-mars mr-2"></i> Genre :</label>
              <br>
              <?php foreach ($genre as $row) : ?>
              <input type="radio" name="genre" value="<?php echo $row->id ?>" id="genre-<?php echo $row->id ?>" required>
              <label for="genre-<?php echo $row->id ?>"><?php echo $row->genre ?></label>
              <br>
              <?php endforeach; ?>
            </div>
            <div class="form-group">
              <label for="email"><i class="fas fa-envelope mr-2"></i> E-Mail :</label>
              <input type="email" class="form-control" id="email" placeholder="E-Mail" name="mail" required>
            </div>
            <div class="form-group">
              <label for="password"><i class="fas fa-lock mr-2"></i> Mot De Passe :</label>
              <input type="password" class="form-control" id="password" placeholder="Mot De Passe" name="mdp" required>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-user-plus mr-2"></i> S'inscrire</button>
          </form>
          <p class="mt-3 text-center">Vous avez déjà un compte ? <a href="sign_in">Se connecter</a></p>
        </div>
      </div>
    </div>
  </div>
  <script src="https://kit.fontawesome.com/your-fontawesome-kit.js"></script>
</body>

</html>
