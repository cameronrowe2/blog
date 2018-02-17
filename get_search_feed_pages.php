<?php

session_start();

require 'config.php';

$str = $_GET['str'];

$mysqli = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

if ($result = $mysqli->query("SELECT posts.ID, posts.text, posts.title, posts.image, posts.aid, accounts.username, accounts.image AS profile_image FROM posts, accounts WHERE posts.aid = accounts.ID && posts.text like '%$str%' ORDER BY posts.ID DESC")) {
  $data = $result->num_rows / 10;

  echo json_encode(["success" => true, "pages" => $data]);
} else {
  echo json_encode(["success" => false]);
}



 ?>
