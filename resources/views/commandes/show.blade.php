<!-- resources/views/commandes/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande Détails</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Détails de la Commande</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Commande #{{ $commande->id }}</h5>
            <p class="card-text">
                <strong>Service:</strong> {{ $commande->service_id }}<br>
                <strong>Adresse:</strong> {{ $commande->adresse }}<br>
                <strong>Description:</strong> {{ $commande->description }}<br>
                <strong>Status:</strong> {{ $commande->status }}<br>
                <strong>Nom d'utilisateur:</strong> {{ $commande->username }}
            </p>
            <a href="{{ route('commandes.index') }}" class="btn btn-secondary">Retour à la liste des commandes</a>
        </div>
    </div>
</div>

</body>
</html>
