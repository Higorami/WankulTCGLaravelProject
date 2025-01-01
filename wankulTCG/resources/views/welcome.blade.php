<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur Wankul TCG Pocket</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <!-- Header -->
    <header class="d-flex justify-content-between align-items-center py-3">
        <img src="{{ asset('wankul_logo.png') }}" alt="Logo" class="img-fluid" style="width: 200px; height: auto;">
        <nav>
                <a href="{{ route('login') }}" class="btn btn-primary">Se Connecter</a>
                <a href="{{ route('register') }}" class="btn btn-success">S'inscrire</a>
        </nav>
    </header>

    <!-- Main Content -->
    <section class="text-center my-5">
        <h2>Bienvenue dans l'univers de Wankul</h2>
        <p>Découvrez des cartes rares, ouvrez des boosters et créez vos decks pour devenir le meilleur !</p>
        <img src="{{ asset('wankul_accueil.png') }}" alt="Wankul Game" class="img-fluid">
    </section>

    <section>
        <h3>Qu'est-ce que Wankul ?</h3>
        <p>Wankul est un jeu de cartes à collectionner où vous pouvez obtenir des cartes, créer des decks et les échanger avec d'autres joueurs. Chaque carte a une rareté différente, et votre objectif est de devenir le meilleur collectionneur !</p>
    </section>

    <section>
        <h3>Consulter le Wankul-dex</h3>
        <a href="https://wankul.fr/pages/wankuldex" class="btn btn-primary btn-lg" target="_blank" rel="noopener noreferrer">
            Accéder au Wankul-dex
        </a>
    </section><br><br>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
