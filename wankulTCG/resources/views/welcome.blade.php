<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur Wankul TCG Pocket</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>

@include('nav_main')

<div class="container">
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
        <h3>Accéder aux fonctionnalités de l'application</h3>
        <p>Pour accéder aux différentes fonctionnalités de l'application, tel que l'ouverture de boosters, le market, la gestion des decks et la vente des cartes, veuillez vous connecter ou créer un compte si cela n'est pas déjà fait !</p>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
