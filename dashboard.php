<?php
require_once "config/koneksi.php";
require_once "safe.php";
Ceklogin();
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
    <!-- Awal Body -->
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
      <!-- Data Postingan -->
      <div class="col-sm-6">
        <div class="panel panel-primary">
          <div class="panel-heading">
            Data Postingan
          </div>
          <div class="panel-body">
            <a href="tambah.php" class='btn btn-sm btn-primary'>Tambah</a>
            <br><br>
            <table class="table table-hover">
              <tbody>
                <tr>
                  <td>No</td>
                  <td>Judul</td>
                  <td>Isi</td>
                  <td colspan="2">Opsi</td>
                </tr>
                  <?php $query = "SELECT * FROM post";
                  $no = 1;
                  foreach (mysqli_query(Con(),$query) as $data) { ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php xecho($data['judul']); ?></td>
                      <td><?php xecho($data['isi']); ?></td>
                      <td><a class='btn btn-sm btn-info' href="edit.php?id=<?php echo $data['id']; ?>">Edit</a></td>
                      <td><a class='btn btn-sm btn-danger' href="hapus.php?id=<?php echo $data['id']; ?>">Hapus</a></td>
                    </tr>

                  <?php $no++; } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- End Data Postingan -->
      <!-- Data User -->
      <div class="col-sm-6">
        <div class="panel panel-primary">
          <div class="panel-heading">
            Data User
          </div>
          <div class="panel-body">
            <a href="tambahUser.php" class='btn btn-sm btn-primary'>Tambah User</a>
            <br><br>
            <div class="table-responsive">
            <table class="table table-hover ">
              <tbody>
                <tr>
                  <td>No</td>
                  <td>Username</td>
                  <td>Password</td>

                </tr>
                  <?php $query = "SELECT * FROM user";
                  $no = 1;
                  foreach (mysqli_query(Con(),$query) as $data) { ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php xecho($data['username']); ?></td>
                      <td><?php xecho($data['password']); ?></td>

                    </tr>

                  <?php $no++; } ?>
              </tbody>
            </table>
          </div>
          </div>
        </div>

      </div>
      <!-- End Data User -->

    </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
