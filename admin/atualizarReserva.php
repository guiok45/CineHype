<?php
include '../db/db.php';

if (!isset($_POST['estado'], $_POST['id'])) {
    http_response_code(400);
    exit("Dados inválidos");
}

$estado = $_POST['estado'];
$id = intval($_POST['id']);

$sql = "UPDATE reservas SET estado = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $estado, $id);

if ($stmt->execute()) {
    echo "ok";
} else {
    http_response_code(500);
    echo "erro";
}

?>