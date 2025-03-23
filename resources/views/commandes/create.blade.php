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

    <!-- Display validation errors -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

</head>

<body>

    <div class="container mt-5">
        <h2 class="text-center">Formulaire de Service</h2>

        <!-- Formulaire -->
        <form action="{{ route('commandes.store') }}" method="POST">
            @csrf <!-- CSRF token for security -->

            <div class="mb-4">
                <label for="username" class="block text-lg font-medium text-gray-700">Nom d'utilisateur :</label>
                <input type="text" id="username" name="username" value="{{ Auth::user()->name }}" class="form-control" readonly>
            </div>


            <!-- Service -->
            <div class="form-group">
                <label for="service">Service :</label>
                <select id="service" name="service_id" class="form-control" required>
                    <!-- Loop through the services and display them -->
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach
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
            <div class="form-group">
                <label for="status">Statut :</label>
                <select id="status" name="status" class="form-control" hidden required>
                    <option value="pending">En attente</option>
                    <option value="approved">Approuvé</option>
                    <option value="rejected">Rejeté</option>
                </select>
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
