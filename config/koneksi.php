<?php
session_start();
function Con(){
  if($con = mysqli_connect("localhost","root","","pentest")){
    return $con;
  }
  else{
    return $con;
  }
}

function Ceklogin(){
  if($_SESSION['status'] != TRUE){
    header('Location: login.php');
  }
}

function Logout(){
  session_destroy();
}
if(isset($_GET['logout'])){
  Logout();
  header('Location: login.php');
}
?>
