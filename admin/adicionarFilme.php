<?php
include '../db/db.php';

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];

    // Verificar se o filme ja existe
    $verificiaEmailStmt = $conn->prepare("SELECT nome FROM filmes WHERE nome = ?");
    $verificiaEmailStmt->bind_param("s", $nome);
    $verificiaEmailStmt->execute();
    $verificiaEmailStmt->store_result();

    if ($verificiaEmailStmt->num_rows > 0) {
        $mensagem = "O filme já existe";
    } else {
        
        $nomeFicheiro = $_FILES["foto"]["name"];
        $nomeTemp = $_FILES["foto"]["tmp_name"];
        $pasta ="assets/imgFilme/".$nomeFicheiro;

        if (move_uploaded_file($nomeTemp,$pasta)) {
          $mensagem = "A imagem ". basename( $_FILES["foto"]["nome"]). " foi adicionada.";
        } else {
          $mensagem = "Não foi possivel adicinar a imagem.";
        }

        $stmt = $conn->prepare("INSERT INTO filmes (nome, descricao, foto) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nome, $descricao, $nomeFicheiro);

        if ($stmt->execute()) {
            header("Location: filmes.php");
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
              src="assets/img/cinema.jpg"
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
            <form action="adicionarFilme.php" method="POST" enctype="multipart/form-data">
            <div class="w-full">
              <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                Adicionar Filme
              </h1>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nome</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Nome" name="nome" id="nome" required
                  
                />
              </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Descrição</span>
                <textarea
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                   name="descricao" id="descricao" required
                ></textarea>
              </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Foto</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                   type="file" name="foto" id="foto" required/>
              </label>

              <label class="block mt-4 text-sm">
              <input
              class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
              value="Adicionar" type="submit" 
              >
            </label>
            <?php if ($mensagem): ?>
                <div class="form-group last mb-3">
                  <label for="error"><?php echo $mensagem ?></label>
                </div>
                <?php endif; ?>
            </div>
            </form>
          </div>
          

        </div>
      </div>
    </div>
  </body>
</html>
