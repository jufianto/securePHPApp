
<?php
require_once "config/koneksi.php";
require_once "safe.php";
Ceklogin();
if(isset($_GET['id'])){
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
      <title>Workshop Linux</title>
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
              <a class="navbar-brand" href="dashboard.php">Dashboard</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="?logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
      <div class="container">
        <div class="col-sm-6">
          <div class="panel panel-primary">
            <div class="panel-heading">
              Data Postingan
            </div>
            <div class="panel-body">
              <form action='' method='POST' class="form-horizontal">
              <input type='hidden' name='id' value="<?php echo $data['id']; ?>">
              <div class="form-group">
                <label class="control-label col-sm-2" for="email">Judul:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name='judul' value="<?php echo $data['judul']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="email">Isi:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name='isi' value="<?php echo $data['isi']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="email"></label>
                <div class="col-sm-10">
                  <button type="submit" name="update" class="btn btn-info">Update</button>
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
  <?php
  if(isset($_POST['update'])){
    $judul=$_POST['judul'];
    $judulsafe = sqlsafe(Con(),$judul);
  	$isi=$_POST['isi'];
    $isisafe = sqlsafe(Con(),$isi);
    $id=$_POST['id'];
    $idsafe = sqlsafe(Con(),$id);
    $query = "UPDATE `post` SET `judul` = '$judulsafe',`isi` = '$isisafe' WHERE  `id` =  '$idsafe'";
    mysqli_query(Con(),$query);
    header('Location: dashboard.php');
  }
}



?>
