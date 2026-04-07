<?php
include '../db/db.php';

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['idReserva'];

    $sql = "DELETE FROM reservas WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
      header("Location: reservas.php");
      exit();
    }
  
    $conn->close();
}
?>