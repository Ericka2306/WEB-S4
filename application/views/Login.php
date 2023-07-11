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

        </div>
      </div>
    </div>
  </div>
</body>
</html>

<!------ Include the above in your HEAD tag ---------->

