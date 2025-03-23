<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Service</title>

    <!-- Lien vers Bootstrap CSS (CDN) -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
   @endif
<ul>

</ul>

</head>
<body>

    <div class="container mt-5">
        <h2 class="text-center">Formulaire de Service</h2>

        <!-- Formulaire -->
        <form action="{{ route() }}" method="POST">
            @csrf <!-- CSRF token for security -->

            <!-- Nom d'utilisateur -->
            <div class="form-group">
                <label for="username">Nom d'utilisateur :</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>

            <!-- Service -->
            <div class="form-group">
                <label for="service">Service :</label>
                <select id="service" name="service" class="form-control" required>
                    <option value="plombier">Plombier</option>
                    <option value="cableur">Câbleur</option>
                    <option value="chauffagiste">Chauffagiste</option>
                    <option value="installeur_solaire">Installeur Solaire</option>
                    <option value="electromecanicien">Electromécanicien</option>
                    <option value="mecanicien">Mécanicien</option>
                </select>
            </div>

            <!-- Adresse -->
            <div class="form-group">
                <label for="adresse">Adresse :</label>
                <input type="text" class="form-control" id="adresse" name="adresse" required>
            </div>

            <!-- Description -->
            <div class="form-group">
                <label for="description">Description :</label>
                <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
            </div>

            <!-- Soumettre le formulaire -->
            <button type="submit" class="btn btn-primary btn-block">Soumettre</button>
        </form>
    </div>

    <!-- Lien vers Bootstrap JS (CDN) et jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> <!-- Full jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
