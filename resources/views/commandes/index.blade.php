<!-- resources/views/commandes/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commandes List</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Liste des Commandes - {{ Auth::user()->name }}</h2>
    <div class="row">
        @foreach ($commandes as $commande)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Commande #{{ $commande->id }}</h5>
                        <p class="card-text">
                            <strong>Service:</strong> {{ $commande->service->name }}<br>
                            <strong>Service price:</strong> {{ $commande->service->price }}<br>
                            <strong>Service description :</strong> {{ $commande->service->description }}<br>


                            <strong>Adresse:</strong> {{ $commande->adresse }}<br>
                            <strong>Status:</strong> {{ $commande->status }}
                        </p>
                        <a href="{{ route('commandes.show', $commande->id) }}" class="btn btn-primary">Voir Détails</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

</body>
</html>
