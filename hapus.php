<?php
require_once "config/koneksi.php";
Ceklogin();
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $query = "DELETE FROM `post` WHERE `id` = '$id'";
  mysqli_query(Con(),$query);
  header('Location: dashboard.php');
}
