<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un utilisateur</title>

    <!-- Lien vers Bootstrap (ajustez le chemin selon votre configuration) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 50px; /* Pour s'assurer que le formulaire est décalé sous la barre de navigation Bootstrap */
        }

        .container {
            max-width: 600px;
            margin-top: 30px;
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
    <h2>Ajouter un utilisateur</h2>

    <form action="/create/user" method="POST" class="form-group">
        @csrf

        <div class="form-group">
            <label for="email">Adresse e-mail :</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="role">Rôle :</label>
            <select name="role" id="role" class="form-control" required>
                <!-- Ajoutez les options en fonction de vos rôles -->
                <!-- Par exemple, si vous avez un modèle Role, vous pouvez boucler sur les rôles -->
                @foreach ($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter l'utilisateur</button>
    </form>
</div>

<!-- Lien vers jQuery et Bootstrap (ajustez le chemin selon votre configuration) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
