<?php
include '../db/db.php';

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT password FROM utilizadores WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($db_password);
        $stmt->fetch();

        if (password_verify($password, $db_password)) {
            session_start();

            $sql = "SELECT * FROM utilizadores where email = '$email'";
            $result = mysqli_query($conn,$sql);
            $utilizador = mysqli_fetch_assoc($result);
            $_SESSION['idUtilizador'] = $utilizador['id'];
            $_SESSION['email'] = $email;
            $_SESSION['nome'] = $utilizador['nome'];
            $_SESSION['cargo'] = $utilizador['cargo'];
            
            if($utilizador['cargo']<3){
              header("Location: ../index_Login.php");
              exit();
            }else{
              header("Location: ../admin/index.php");
              exit();
            }
            
        }else{
          $mensagem = "Palavra-passe errada";
        }
    }else{
        $mensagem = "Email não foi encontrado";
    }

    $stmt->close();
    $conn->close();
}
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

    <title>CineHype</title>
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
              <h3><strong>Cine<span>Hype</span></strong></h3>
              </div>
              <form action="login.php"  method="POST">
                <div class="form-group first">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" placeholder="email@gmail.com" name="email" id="email" required>
                </div>
                <div class="form-group last mb-3">
                  <label for="password">Palavra-Passe</label>
                  <input type="password" class="form-control" placeholder="Palavra-Passe" name="password" id="password" required>
                </div>
                
                <div class="d-sm-flex mb-5 align-items-center">
                  <span><a href="registo.php" class="forgot-pass">Registar</a></span> 
                  <span class="ml-auto"><a href="#" class="forgot-pass">Recuperar Palavra-Passe</a></span> 
                </div>

                <?php if ($mensagem): ?>
                <div class="form-group last mb-3">
                  <label for="error"><?php echo $mensagem ?></label>
                </div>
                <?php endif; ?>

                <input type="submit" value="Autenticar" class="btn btn-block btn-primary">

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