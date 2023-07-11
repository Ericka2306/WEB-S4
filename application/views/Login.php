<!DOCTYPE html>
<html>
<head>
  <title>Login - Thème Noir</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #333;
      color: #fff;
    }

    .login-form {
      max-width: 700px;
      margin: 0 auto;
      background-color: #222;
      padding: 30px;
      border-radius: 5px;
      margin-top: 200px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
    }

    .login-form h2 {
      text-align: center;
      margin-bottom: 30px;
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
    }

    .login-form .btn-primary:hover {
      background-color: #fff;
      color: green;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="login-form">
<<<<<<< Updated upstream
          <h2>Login</h2>
          <form action="log_in_validation" method="POST">
            
                  <div class="form-group">
                     <label>E-Mail</label>
                     <input type="text" class="form-control" placeholder="E-Mail" name="mail">
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" class="form-control" placeholder="Password" name="mdp">
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">Login</button>
         </form>
         <br>
        <a href="sign_up">S'inscrire</a>

=======
          <h2 class="mb-4"><i class="fas fa-dumbbell mr-2"></i>ShapeUp</h2>

          <form action="<?php echo site_url('Sign/log_in_validation')?>" method="POST">
            <div class="form-group">
              <label for="email"><i class="fas fa-envelope mr-2"></i> E-Mail</label>
              <input type="email" class="form-control" id="email" placeholder="E-Mail" name="mail" required>
            </div>
            <div class="form-group">
              <label for="password"><i class="fas fa-lock mr-2"></i> Password</label>
              <input type="password" class="form-control" id="password" placeholder="Password" name="mdp" required>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt mr-2"></i> Login</button>
          </form>
          
          <p class="mt-3 text-center">Vous n'avez pas de compte ? <a href="<?php echo site_url('Sign/sign_up')?>">S'inscrire</a></p>
>>>>>>> Stashed changes
        </div>
      </div>
    </div>
  </div>
</body>
</html>

<!------ Include the above in your HEAD tag ---------->

