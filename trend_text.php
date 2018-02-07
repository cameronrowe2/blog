<?php

session_start();

function addTrend($words, $start, $end){
  $trend = "";
  for($start = $i; $i < $end; $i++){
    $trend .= $words[$i] + " ";
  }
  return trim($trend);
}

$sentence = $_GET['text'];

$words = split($sentence, ' ');

// open json file

// set as variable

$arr = [];

foreach ($words as $key => $value) {
  # code...

  // check if word is noun, if yes, set arr as N, else set arr as O
}

$trends = [];

$start = 0;

// find N's side by side, and set as trends
for($i = 1; $i < strlen($words); $i++){
  if($arr[$i] === "O" && $arr[$i-1] === "N")
    $trends[] = addTrend($words, $start, $i)
  if($arr[$i] === "N" && $arr[$i-1] === "O")
    $start = $i;

}

json_encode(["success" => true, "trends" => $trends])

 ?>
