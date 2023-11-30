<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'utilisateur</title>

    <!-- Lien vers Bootstrap (ajustez le chemin selon votre configuration) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 50px; /* Pour s'assurer que le formulaire est décalé sous la barre de navigation Bootstrap */
        }

        .container {
            max-width: 600px;
        }

        h2 {
            color: #007bff; /* Couleur bleue de Bootstrap */
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        input.form-control {
            margin-bottom: 15px;
        }

        button.btn-primary {
            width: 100%;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Modifier l'utilisateur</h2>
    <a href="/user" class="btn btn-sm btn-danger">Retour</a>
    <form action="/update/user" method="POST" class="form-group">
        @csrf
        <input type="text" name="id" class="form-control" style="display: none" value="{{ $user->id }}">
        <div class="form-group">
            <label for="email">Nouvelle ad²resse e-mail :</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
    </form>
</div>

<!-- Lien vers jQuery et Bootstrap (ajustez le chemin selon votre configuration) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
