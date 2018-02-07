<?php

session_start();

$email = $_GET['email'];
$uname = $_GET['uname'];
$password = $_GET['password'];

if($email == "") {
  echo json_encode(["success" => false, "message" => "email empty"]);
  exit();
}

if($uname == "") {
  echo json_encode(["success" => false, "message" => "username empty"]);
  exit();
}

if($password == "") {
  echo json_encode(["success" => false, "message" => "password empty"]);
  exit();
}

// valid email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo json_encode(["success" => false, "message" => "email invalid"]);
  exit();
}

// valid password
if(strlen($uname) < 6) {
  echo json_encode(["success" => false, "message" => "username too short"]);
  exit();
}

// valid password
if(strlen($password) < 6) {
  echo json_encode(["success" => false, "message" => "password too short"]);
  exit();
}

$password_hash = password_hash($password, PASSWORD_BCRYPT);

$mysqli = new mysqli('localhost', 'root2', 'root2', 'blog');

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

$result = $mysqli->query("SELECT * FROM accounts WHERE email = '$email'");

if($result->num_rows > 0) {
  echo json_encode(["success" => false, "message" => "email exists"]);
  exit();
}

$result = $mysqli->query("SELECT * FROM accounts WHERE username = '$uname'");

if($result->num_rows > 0) {
  echo json_encode(["success" => false, "message" => "username exists"]);
  exit();
}

if ($result = $mysqli->query("INSERT INTO accounts (email, username, password) VALUES ('$email', '$uname', '$password_hash')")) {
  $ID = $mysqli->insert_id;

  echo json_encode(["success" => true, "id" => $ID]);
} else {
  echo json_encode(["success" => false]);
}



 ?>
