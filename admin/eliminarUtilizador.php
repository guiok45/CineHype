<?php
include '../db/db.php';

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['idUtilizador'];

    $sql = "DELETE FROM utilizadores WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
      header("Location: index.php");
      exit();
    }
  
    $conn->close();
}
?>