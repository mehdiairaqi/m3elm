<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <title>Top Deals</title>

    <!-- Link to local Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/blue.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/rateit.css">
    <link rel="stylesheet" href="css/bootstrap-select.min.css">

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="css/font-awesome.css">

    <!-- Custom CSS for Top Deals and buttons -->
    <style>
        /* Custom Style for Top Deals */
        .top-deals-header {
            font-size: 2rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        /* Making the "inspecter" button lowercase */
        .btn-inspecter {
            text-transform: lowercase;
        }

        /* Remove yellow background under the divs */
        .card-body {
            background-color: transparent !important;
        }
    </style>

</head>

<body class="cnt-home">
    <!-- ============================================== HEADER ============================================== -->
    <header class="header-style-1">

        <!-- ============================================== TOP MENU ============================================== -->
        @include('partials.nav1service')

        <div class="container mt-4">
            <header class="text-center mb-4 top-deals-header">
                <h1 style="font-size: 3rem; color: #007bff; text-align: center; font-family: 'Arial', sans-serif; text-transform: uppercase; letter-spacing: 2px; margin-top: 50px; font-weight: bold; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);">
                    Nos services
                </h1>
                <br>
                <br>

            </header>

            <!-- Grid layout for the deals -->
            <section class="row">
                <div class="col-md-3 mb-4">
                    <div class="card" style="width: 100%; height: 100%;"> <!-- Increase card size here -->
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Yves Saint Laurent Black Opium">
                        <div class="card-body">
                            <p class="card-title">plombier</p>
                            <p>Profitez d'un service de plomberie professionnel pour résoudre vos problèmes de plomberie rapidement et efficacement.</p>
                            <p class="card-text">à partire de 199 dh <span class="text-danger">-36%</span></p>
                            <a href="{{ url('/plombier') }}" class="btn btn-primary btn-inspecter">inspecter</a>
                             <!-- Inspect button added -->
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <div class="card" style="width: 100%; height: 100%;"> <!-- Increase card size here -->
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="BUY SAT 32' SMART TV">
                        <div class="card-body">
                            <p class="card-title">chaufagisste</p>
                            <p>Profitez d'un service de plomberie professionnel pour résoudre vos problèmes de plomberie rapidement et efficacement.</p>
                            <p class="card-text">a partire de 99 dh <span class="text-danger">-41%</span></p>
                            <a href="#" class="btn btn-primary btn-inspecter ml-2">inspecter</a> <!-- Inspect button added -->
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <div class="card" style="width: 100%; height: 100%;"> <!-- Increase card size here -->
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Un Amour De Tapis">
                        <div class="card-body">
                            <p class="card-title">mecanicien</p>
                            <p>Profitez d'un service de plomberie professionnel pour résoudre vos problèmes de plomberie rapidement et efficacement.</p>
                            <p class="card-text">a partir de 299 dh <span class="text-danger">-40%</span></p>
                            <a href="#" class="btn btn-primary btn-inspecter">inspecter</a> <!-- Inspect button added -->
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <div class="card" style="width: 100%; height: 100%;"> <!-- Increase card size here -->
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Elit Moule à Gâteau">
                        <div class="card-body">
                            <p class="card-title">instaleur solaire</p>
                            <p>Profitez d'un service de plomberie professionnel pour résoudre vos problèmes de plomberie rapidement et efficacement.</p>
                            <p class="card-text">a partir de 159 dh <span class="text-danger">-18%</span></p>
                            <a href="{{route('commandes.create')}}" class="btn btn-primary btn-inspecter">inspecter</a> <!-- Inspect button added --> <!-- Inspect button added -->
                        </div>
                    </div>
                </div>
            </section>

            <br><br><br>

        </div>
    </header>
</body>

<!-- Link to local Bootstrap JS -->
<script src="js/bootstrap.min.js"></script>

</html>
