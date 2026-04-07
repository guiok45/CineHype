<?php
include 'db/db.php';

$mensagem = "";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_filme = $_POST['id_filme'];
    $id_utilizador = $_POST['id_utilizador'];
    $dataReserva = date('Y-m-d', strtotime($_POST['dataReserva']));
    $estado = 1;

    // Verificar se o filme esta disponivel
    $verificiaFilmeStmt = $conn->prepare("SELECT id FROM reservas WHERE filme_id = $id_filme AND estado = 1 OR estado = 2 ");
    $verificiaFilmeStmt->execute();
    $verificiaFilmeStmt->store_result();

    if ($verificiaFilmeStmt->num_rows > 0) {
        $mensagem = "O filme já esta reservado";
        echo "<script>alert('$mensagem');</script>";
        header("Location: filme_login.php?id=$id_filme");
    } else {        
        $stmt = $conn->prepare("INSERT INTO reservas (filme_id, utilizador_id, data_reserva, estado) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $id_filme, $id_utilizador, $dataReserva,$estado);

        if ($stmt->execute()) {
            header("Location: filmes_login.php");
            exit();
        } else {
          $stmt->close();
    }

    $verificiaFilmeStmt->close();
    $conn->close();
}}
?>