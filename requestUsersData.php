<?php
include_once('./model/Users.php');

$data = file_get_contents('./model/users.json');

$json_arr = json_decode($data, true);
// echo $data;

// var_dump($json_arr); //convert to associative array
$data = new Users();
$output = $data->getUser();
echo json_encode($output);
?>