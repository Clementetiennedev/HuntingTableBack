<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backoffice - Page d'Accueil</title>

    <!-- Lien vers Bootstrap (ajustez le chemin selon votre configuration) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 50px; /* Pour s'assurer que le contenu est décalé sous la barre de navigation Bootstrap */
        }

        .container {
            max-width: 600px;
            margin-top: 30px;
        }

        h2 {
            color: #007bff; /* Couleur bleue de Bootstrap */
            text-align: center;
        }

        .btn-container {
            text-align: center;
        }

        .btn-group {
            margin-top: 20px;
        }

        .btn {
            margin: 10px;
            width: 200px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Bienvenue dans le Backoffice <br> de Hunting Table</h2>

    <div class="btn-container">
        <div class="btn-group">
            <a href="/user" class="btn btn-primary">Gérer les Utilisateurs</a>
            <a href="/society" class="btn btn-primary">Gérer les Sociétés</a>
        </div>

</div>

<!-- Lien vers jQuery et Bootstrap (ajustez le chemin selon votre configuration) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
