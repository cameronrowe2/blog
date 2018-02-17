<?php

session_start();

require 'config.php';

$email = $_GET['email'];

if($email == "") {
  echo json_encode(["success" => false, "message" => "email empty"]);
  exit();
}

// valid email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo json_encode(["success" => false, "message" => "email invalid"]);
  exit();
}

$mysqli = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

$result = $mysqli->query("SELECT * FROM accounts WHERE email = '$email'");

if($result->num_rows == 0) {
  echo json_encode(["success" => false, "message" => "email doesnt exist"]);
  exit();
}

$row = $result->fetch_assoc();
$email_2 = $row['email'];

$hash = password_hash("123", PASSWORD_BCRYPT);

// save fp hash to database
if($result = $mysqli->query("UPDATE accounts SET fp_hash='$hash' WHERE email = '$email_2'")) {
  $message = "Click the following link to reset your password localhost:8888/reset_password.html?email=$email_2&hash=$hash";

  $message = wordwrap($message, 70, "\r\n");

  $val = mail($email_2, 'Forgot Password', $message);
  if($val) {
    echo json_encode(["success" => true, "message" => "email sent", "value" => $val]);
  } else {
    echo json_encode(["success" => false, "message" => "email not sent", "value" => $val]);
  }
} else {
  echo json_encode(["success" => false, "message" => "hash not saved correctly"]);
}

 ?>
