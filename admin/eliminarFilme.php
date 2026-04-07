<?php
include '../db/db.php';

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['idFilme'];

    $sql = "DELETE FROM filmes WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
      header("Location: filmes.php");
      exit();
    }
  
    $conn->close();
}
?>