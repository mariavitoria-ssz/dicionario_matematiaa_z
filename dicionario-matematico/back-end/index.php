<?php include 'db/conexao.php'; ?>
<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dicionário Matemático - Back-End</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Roboto', sans-serif;
        }
        
        .navbar-custom {
            background-color: #5e72e4;
            padding: 15px 20px;
        }

        .navbar-custom .navbar-brand {
            color: white;
            font-weight: bold;
            font-size: 1.8rem;
        }

        .navbar-custom .navbar-brand:hover {
            color: #d1d1e9;
        }

        .navbar-custom .nav-link {
            color: white;
            font-weight: 500;
            margin-right: 15px;
        }

        .navbar-custom .nav-link:hover {
            color: #d1d1e9;
        }

        .container {
            max-width: 1200px;
            margin-top: 30px;
        }

        .card {
            margin-bottom: 1.5rem;
        }

        .card-title {
            color: #5e72e4;
        }

        .card-body {
            padding: 1.5rem;
        }

        .card-text {
            font-size: 1.1rem;
            color: #555;
        }

        .btn-custom {
            font-weight: bold;
            border-radius: 10px;
        }

        .btn-primary {
            background-color: #5e72e4;
            border-color: #5e72e4;
        }

        .btn-primary:hover {
            background-color: #4e61c1;
            border-color: #4e61c1;
        }

        .btn-warning {
            background-color: #ffae00;
            border-color: #ffae00;
        }

        .btn-warning:hover {
            background-color: #e69500;
            border-color: #e69500;
        }

        .footer-custom {
            background-color: #343a40;
            color: white;
            padding: 20px;
        }

        .footer-custom p {
            margin: 0;
        }

    </style>
</head>
<body>

    <!-- Barra de Navegação -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand" href="#">Dashboard Dicionário Matemático</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
            <a href="../front-end/home.php">
                <button class="btn btn-primary btn-sm" style="margin:5px;" type="button">Ir para o site</button>
            </a>
            <a href="logout.php">
                <button class="btn btn-warning btn-sm" type="button"><i class="bi bi-box-arrow-right"></i></button>
            </a>
        </div>
    </nav>

    <div class="container">
        <?php echo "<h1>Bem-vindo, " . $_SESSION['usuario_nome'] . "</h1>"; ?>        

        <form method="POST" action="index.php" class="my-3">
            <div class="input-group mb-3">
                <input type="text" name="pesquisa" class="form-control" placeholder="Pesquisar termo..." aria-label="Pesquisar termo">
                <button class="btn btn-primary" type="submit">Pesquisar</button>
            </div>
        </form>

        <a href="CRUD/adicionar.php" class="btn btn-success btn-sm mb-3">Adicionar Novo Termo</a>

        <?php
        $sql = "SELECT * FROM termos";
        if (isset($_POST['pesquisa'])) {
            $pesquisa = $_POST['pesquisa'];
            $sql .= " WHERE termo LIKE '%$pesquisa%'";
        }
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='card'>";
                echo "<div class='card-body'>";
                echo "<div class='d-flex justify-content-between align-items-center'>";
                echo "<h2 class='card-title'>{$row['termo']}</h2>";
                echo "<div>";
                echo "<a href='CRUD/editar.php?id={$row['id']}' class='btn btn-warning btn-sm'>Editar</a> ";
                echo "<a href='CRUD/excluir.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Deseja excluir este termo?')\">Excluir</a>";
                echo "</div>";
                echo "</div>";
                echo "<p class='card-text'>{$row['definicao']}</p>";

                // Exibir a imagem, se houver
                if (!empty($row['imagem'])) {
                    echo "<img src='{$row['imagem']}' alt='{$row['termo']}' class='img-fluid' style='max-height: 200px;'>";
                }
                echo "</div></div>";
            }
        } else {
            echo "<p class='alert alert-info'>Nenhum termo encontrado.</p>";
        }
        $conn->close();
        ?>
    </div>

    <!-- Rodapé -->
    <footer class="footer-custom">
        <p>&copy; 2024 Dicionário Matemático | Todos os direitos reservados</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
