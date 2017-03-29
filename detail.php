<?php
require_once "config/koneksi.php";
require_once "safe.php";
$id = $_GET['id'];
$idsafe = sqlsafe(Con(),$id);
$query = "SELECT * FROM  `post` WHERE  `id` =  '$idsafe'";
$exe = mysqli_query(Con(),$query);
$data = mysqli_fetch_array($exe);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Saklar</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Dashboard</a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <div class="container">
        <div class="panel panel-primary">
          <div class="panel-heading">
            Detail Postingan
          </div>
          <div class="panel-body">
            <div class="thumbnail">
              <img src="<?php echo "img/".$data['gambar']; ?>" alt="" />
              <div class="caption">
                <p align='left'>
                  <h3><?php echo $data['judul']; ?></h3>
                </p>
                <p align='left'>
                  <?php echo $data['isi']; ?>
                </p>
              </div>
            </div>
          </div>
        </div>
    </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
