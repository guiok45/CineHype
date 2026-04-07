<?php
include '../db/db.php';

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Verificar se o email ja existe
    $verificiaEmailStmt = $conn->prepare("SELECT email FROM utilizadores WHERE email = ?");
    $verificiaEmailStmt->bind_param("s", $email);
    $verificiaEmailStmt->execute();
    $verificiaEmailStmt->store_result();

    if ($verificiaEmailStmt->num_rows > 0) {
        $mensagem = "O email já existe";
    } else {
        
        $stmt = $conn->prepare("INSERT INTO utilizadores (nome, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nome, $email, $hashedPassword);

        if ($stmt->execute()) {
            $mensagem = "Conta criada com sucesso";
            header("Location: login.php");
            exit();
        } else {
            $mensagem = "Error: " . $stmt->error;
        $stmt->close();
		  
    }

    $verificiaEmailStmt->close();
    $conn->close();
}}
?>
<!doctype html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="shortcut icon" type="image/icon" href="../assets/logo/favicon.png"/>
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <title>LivrosWOW</title>
  </head>
  <body>
  <div class="d-md-flex half">
    <div class="bg" style="background-image: url('images/bg_1.jpg');"></div>
    <div class="contents">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12">
            <div class="form-block mx-auto">
              <div class="text-center mb-5">
              <h3><strong>Livros<span>WOW</span></strong></h3>
              </div>

              <form action="registo.php" method="POST">
                <div class="form-group first">
                  <label for="Nome">Nome</label>
                  <input type="text" class="form-control" placeholder="Nome" name="nome" id="nome" required>
                </div>
                <div class="form-group first">
                  <label for="Email">Email</label>
                  <input type="text" class="form-control" placeholder="email@gmail.com" name="email" id="email" required>
                </div>
                <div class="form-group last mb-3">
                  <label for="Password">Palavra-Passe</label>
                  <input type="password" class="form-control" placeholder="Palavra-Passe" name="password" id="password" required>
                </div>
                
                <div class="d-sm-flex mb-5 align-items-center">
                  <span><a href="login.html" class="forgot-pass">Já tenho conta</a></span> 
                </div>

                <?php if ($mensagem): ?>
                <div class="form-group last mb-3">
                  <label for="error"><?php echo $mensagem ?></label>
                </div>
                <?php endif; ?>

                <input type="submit" value="Registo" id="Registo" class="btn btn-block btn-primary">
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>