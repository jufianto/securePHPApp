<?php
require_once "config/koneksi.php";
require_once "safe.php";
if(isset($_POST['login'])){
  $username = $_POST['username'];
  $usersafe = sqlsafe(Con(),$username);
  $password = $_POST['password'];
  $passsafe = sqlsafe(Con(),$password);
  $query = "SELECT * FROM user WHERE username='$usersafe'";
  $get = mysqli_query(Con(),$query);
  $data = mysqli_fetch_array($get);
  if(password_verify($passsafe,$data['password']))
  {
    $_SESSION['status'] = TRUE;
    $_SESSION['username'] = $username;
    header('Location: dashboard.php');
}else{
  header('Location: login.php');
}

}
else{ ?>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Login</title>
      <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
      <nav class="navbar">
      </nav>
      <div class="container">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
          <div class="panel panel-primary" >
            <div class="panel-heading">
                <div class="panel-title">Log In</div>
            </div>
            <div class="panel-body" >
                <form method="post" action="">
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username">
                    </div>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                    </div>
                      <div style="margin-top:10px" class="form-group">
                          <div class="col-sm-12 controls">
                            <button type='submit' class="btn btn-success" name='login'>Login</button>
                          </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>

      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
  </html>

<?php } ?>
