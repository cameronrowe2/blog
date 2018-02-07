<?php

session_start();

$mysqli = new mysqli('localhost', 'root2', 'root2', 'blog');

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

if ($result = $mysqli->query("INSERT INTO images () VALUES ()")) {
  $ID = $mysqli->insert_id;

  $name = $_FILES['file']['name'];
  $ext = substr($name, strrpos($name, "."));

  $sourcePath = $_FILES['file']['tmp_name'];
  $targetPath = "images/".$ID.$ext;
  $value = move_uploaded_file($sourcePath,$targetPath);

  echo json_encode(["success" => true, "image_url" => $targetPath]);
} else {
  echo json_encode(["success" => false]);
}



 ?>
