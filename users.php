<?php
include_once('./model/data.php');

$data = file_get_contents('./model/users.json');

$json_arr = json_decode($data, true);
// echo $data;

// var_dump($json_arr); //convert to associative array
$data = new Users();
$vvv = $data->getData();
echo json_encode($vvv);
?>