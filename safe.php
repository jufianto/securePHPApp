<?php

function sqlsafe($conn,$var)
{
  $data = mysqli_real_escape_string($conn,$var);
  return $data;
}

function safexss($var,$encoding='UTF-8')
{
  return htmlspecialchars($var,ENT_QUOTES | ENT_HTML401,$encoding);
}

function xecho($data)
{
   echo safexss($data);
}
