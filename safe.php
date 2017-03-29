<?php

function sqlsafe($conn,$var)
{
  $data = mysqli_real_escape_string($conn,$var);
  return $data;
}
