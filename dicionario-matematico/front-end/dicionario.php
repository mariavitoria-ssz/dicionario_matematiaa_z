<?php
// Inclui a conexão com o banco de dados
include('../back-end/db/conexao.php');

// Verifica se a conexão foi estabelecida
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Obtém a letra selecionada, se houver
$letra = isset($_GET['letra']) ? $_GET['letra'] : '';

// Consulta os dados dos termos com filtro por letra, se aplicável
$sql = "SELECT termo, definicao FROM termos";
if ($letra) {
    $sql .= " WHERE termo LIKE '$letra%'"; // Filtra por termos que começam com a letra selecionada
}
$sql .= " ORDER BY termo ASC"; // Ordena por ordem alfabética

// Executa a consulta e verifica se ocorreu algum erro
$result = $conn->query($sql);

if (!$result) {
    die("Erro na consulta: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dicionário Matemático</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos para a barra de navegação */
        .navbar-custom {
            background-color: #5e72e4;
            padding: 15px 20px;
        }
        .navbar-custom .navbar-brand {
            color: #fff;
            font-weight: bold;
            font-size: 1.8rem;
        }
        .navbar-custom .navbar-brand:hover {
            color: #d1d1e9;
        }
        .navbar-custom .nav-link {
            color: #fff;
            font-weight: 500;
            margin-right: 15px;
        }
        .navbar-custom .nav-link:hover {
            color: #d1d1e9;
        }

        /* Estilos principais */
        body {
            background-color: #f8f9fa;
            font-family: 'Roboto', sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin-top: 30px;
            padding: 0 15px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            font-size: 3rem;
            color: #5e72e4;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .filtro-letras {
            text-align: center;
            margin-bottom: 20px;
            padding: 10px 0;
            background-color: #dfe3f2;
            border-radius: 10px;
        }
        .filtro-letras a {
            margin: 0 8px;
            color: #5e72e4;
            font-weight: 500;
            font-size: 1.2rem;
            text-decoration: none;
            padding: 8px 14px;
            border-radius: 8px;
            transition: background-color 0.3s, color 0.3s;
        }
        .filtro-letras a:hover {
            background-color: #5e72e4;
            color: #fff;
            transform: scale(1.1);
        }

        /* Estilos para os cards */
        .card {
            margin-bottom: 30px;
            border: none;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-body {
            padding: 25px;
        }

        .termo-title {
            font-weight: bold;
            color: #5e72e4;
            font-size: 1.4rem;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 1.1rem;
            color: #555;
            line-height: 1.8;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .text-center {
            font-size: 1.3rem;
            color: #888;
            padding: 30px 0;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .header h1 {
                font-size: 2.5rem;
            }
            .filtro-letras a {
                font-size: 1rem;
            }
            .card-body {
                padding: 20px;
            }
            .card-title {
                font-size: 1.3rem;
            }
        }
    </style>
</head>
<body>
    <!-- Barra de Navegação -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand" href="home.php">Matemática A-Z</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../back-end/index.php">Área de administração</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="header">
            <h1>Bem-vindo ao Matemática A-Z!</h1>
        </div>

        <div class="filtro-letras">
            <span>Filtrar por letra:</span>
            <?php foreach (range('A', 'Z') as $char): ?>
                <a href="?letra=<?= $char ?>"><?= $char ?></a>
            <?php endforeach; ?>
        </div>

        <?php if ($result->num_rows > 0): ?>
            <div class="row">
                <?php while($row = $result->fetch_assoc()): ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4 d-flex justify-content-center">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="termo-title"><?= htmlspecialchars($row['termo']); ?></h5>
                                <p class="card-text"><?= nl2br(htmlspecialchars($row['definicao'])); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p class="text-center">Nenhum termo encontrado para essa letra.</p>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>


<?php
// Fecha a conexão com o banco de dados
$conn->close();
?>
