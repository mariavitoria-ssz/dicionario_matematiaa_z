<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Dicionário Matemático</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilo para a barra de navegação */
        <style>
    /* Estilo para o fundo da página */
    body {
        background-color: #f4f6fc; /* Cor suave e complementar ao azul */
    }

    /* Estilo para a barra de navegação */
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

    /* Banner principal */
    .banner {
        background-color: #5e72e4; /* Cor sólida de fundo */
        height: 100vh;
        color: #fff;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 0 20px;
    }
    .banner h1 {
        font-size: 4rem;
        font-weight: bold;
        margin-bottom: 20px;
        animation: fadeInUp 1s ease-out;
    }
    .banner p {
        font-size: 1.6rem;
        margin-bottom: 30px;
        animation: fadeInUp 1.2s ease-out;
    }
    .btn-banner {
        font-size: 1.2rem;
        padding: 12px 30px;
        color: #5e72e4;
        background-color: #fff;
        border-radius: 30px;
        text-decoration: none;
        transition: background-color 0.3s, color 0.3s;
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
    }
    .btn-banner:hover {
        background-color: #5e72e4;
        color: #fff;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    /* Animação para o efeito do texto */
    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Seção de Destaques */
    .highlights {
        padding: 50px 0;
        text-align: center;
        background-color: #f8f9fa;
    }
    .highlight-title {
        font-size: 2rem;
        font-weight: 700;
        color: #5e72e4;
        margin-bottom: 30px;
    }
    .highlight-item {
        padding: 20px;
        margin-bottom: 30px;
        border-radius: 15px;
        background-color: #ffffff;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    .highlight-item h4 {
        color: #5e72e4;
        font-size: 1.5rem;
        margin-bottom: 15px;
    }
    .highlight-item p {
        font-size: 1.1rem;
        color: #555;
        line-height: 1.6;
    }

    /* Responsividade */
    @media (max-width: 768px) {
        .banner h1 {
            font-size: 2.5rem;
        }
        .banner p {
            font-size: 1.2rem;
        }
        .highlight-title {
            font-size: 1.8rem;
        }
    }
</style>

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
                    <a class="nav-link" href="dicionario.php">Dicionário</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../back-end/index.php">Área de administração</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Banner Principal -->
    <section class="banner">
        <div class="banner-content">
            <h1>Explore o Mundo da Matemática</h1>
            <p>Descubra definições e conceitos matemáticos de forma prática e acessível.</p>
            <a href="dicionario.php" class="btn-banner">Acessar o Dicionário</a>
        </div>
    </section>

    <!-- Seção de Destaques -->
    <section class="highlights">
        <h2 class="highlight-title">Destaques do Dicionário</h2>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="highlight-item">
                        <h4>Conceitos Básicos</h4>
                        <p>Termos essenciais para quem está começando a jornada no mundo da matemática.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="highlight-item">
                        <h4>Teoremas e Fórmulas</h4>
                        <p>Definições de teoremas e fórmulas fundamentais para resolver problemas matemáticos.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="highlight-item">
                        <h4>Matemática Avançada</h4>
                        <p>Explore conteúdos mais complexos para aprofundar seu conhecimento.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
