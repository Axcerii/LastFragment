<?php
include_once '../Redirecteur.php';
include 'afficherObjets.php';

$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'];
$field = $data['field'];
$value = $data['value'];

$query = "UPDATE objets SET $field = ? WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('si', $value, $id);
$stmt->execute();
?>