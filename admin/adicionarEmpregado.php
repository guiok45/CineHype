<?php
include '../db/db.php';

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $cargo = 2;

    // Verificar se o email ja existe
    $verificiaEmailStmt = $conn->prepare("SELECT email FROM utilizadores WHERE email = ?");
    $verificiaEmailStmt->bind_param("s", $email);
    $verificiaEmailStmt->execute();
    $verificiaEmailStmt->store_result();

    if ($verificiaEmailStmt->num_rows > 0) {
        $mensagem = "O email já existe";
    } else {
        
        $stmt = $conn->prepare("INSERT INTO utilizadores (nome, email, password, cargo) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nome, $email, $hashedPassword,$cargo);

        if ($stmt->execute()) {
            $mensagem = "Conta criada com sucesso";
            header("Location: index.php");
            exit();
        } else {
            $mensagem = "Error: " . $stmt->error;
        $stmt->close();
		  
    }

    $verificiaEmailStmt->close();
    $conn->close();
}}
?>

<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CineHype Admin</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./assets/css/tailwind.output.css" />
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="./assets/js/init-alpine.js"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"
    />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
      defer
    ></script>
    <script src="./assets/js/charts-lines.js" defer></script>
    <script src="./assets/js/charts-pie.js" defer></script>
  </head>
  <body>
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
      <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
        <div class="flex flex-col overflow-y-auto md:flex-row">
          <div class="h-32 md:h-auto md:w-1/2">
            <img
              aria-hidden="true"
              class="object-cover w-full h-full dark:hidden"
              src="assets/img/create-account-office.jpeg"
              alt="Office"
            />
            <img
              aria-hidden="true"
              class="hidden object-cover w-full h-full dark:block"
              src="assets/img/create-account-office-dark.jpeg"
              alt="Office"
            />
          </div>

          
          <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <form action="adicionarEmpregado.php" method="POST">
            <div class="w-full">
              <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                Adicionar Empregado
              </h1>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nome</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Nome" name="nome" id="nome" required
                  
                />
              </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Email</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="email@gmail.com" name="email" id="email" required
                />
              </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Password</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Palavra-Passe" type="password" name="password" id="password" required
                />
              </label>

              <label class="block mt-4 text-sm">
              <input
              class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
              value="Adicionar" type="submit" 
              >
            </label>
            </div>
            </form>
          </div>
          

        </div>
      </div>
    </div>
  </body>
</html>
