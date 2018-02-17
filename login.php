<?php

session_start();

require 'config.php';

$email = $_GET['email'];
$password = $_GET['password'];

$mysqli = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

if ($result = $mysqli->query("SELECT * FROM accounts WHERE email = '$email'")) {
  $row = $result->fetch_assoc();

  if( password_verify($password, $row['password']) ) {
    $_SESSION['ID'] = $row['ID'];
    echo json_encode(["success" => true, "id" => $row['ID']]);
  } else {
    echo json_encode(["success" => false]);
  }
} else {
  echo json_encode(["success" => false]);
}



 ?>
