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

<div>
    <div class="market">
        @if ($message)
            <h4 style="color: green">{{ $message }}</h4>
        @endif
        @if ($error)
            <h4 style="color: red">{{ $error }}</h4>
        @endif
        <div class="filtre">
            <form action="{{ route('market') }}" method="get">
                @csrf

                <input type="text" name="name" id="name" placeholder="Nom" value="{{ $name }}">
                <button type="submit">Filtrer</button>
            </form>
        </div>
        <div class="porte-monnaie">
            <h4>Porte-monnaie : {{ $user->money }} €</h4>
        </div>
        <div class="cards-container">
            @foreach($cards as $card)
                <div class="card-item">
                    <div class="card-frame"></div> <!-- Cadre décoratif -->
                    <img src="{{ asset('storage/cards/' . $card->imageName) }}" alt="{{ $card->name_card }}" class="card-image">
                    <div class="card-info">
                        <h4>{{ $card->price }} €</h4>
                        <form action="{{ route('market.buy') }}" method="post">
                            @csrf

                            <input type="hidden" name="card_id" value="{{ $card->id_Card }}">
                            <input type="hidden" name="name" value="{{ $name }}">
                            <button type="submit">Acheter</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="no-cards">
            @if (count($cards) == 0)
                <h4>Aucune carte que vous ne possédez pas déjà en 3 exemplaires ne correspond à votre recherche</h4>
            @endif
        </div>
    </div>
</div>

</body>

<style>

    .market {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
    }

    .filtre {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
    }

    .cards-container {
        max-width: 90vw;
        margin: 20px auto;
        display: grid;
        grid-template-columns: repeat(5, 1fr); /* 3 colonnes */
        gap: 20px;
    }

    .card-item {
        position: relative; /* Nécessaire pour positionner le cadre */
        text-align: center;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        padding: 15px;
        transition: transform 0.2s;
    }
    .card-item:hover {
        transform: translateY(-5px); /* L'effet au survol */
    }
    .card-image {
        width: 100%; /* L'image occupe toute la largeur */
        max-width: 15vw; /* Limite la taille des images */
        height: auto;
        margin: 0 auto;
    }
    .card-info {
        margin-top: 10px;
        font-size: 14px;
        font-weight: bold;
        color: #333;
    }

    .card-frame {
        position: absolute; /* Positionne le cadre par-dessus la carte */
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 5px solid #ffce00; /* Couleur et épaisseur du cadre */
        border-radius: 10px; /* Assure que le cadre suit les contours de la carte */
        pointer-events: none; /* Permet de cliquer à travers le cadre */
        box-shadow: 0 0 10px rgba(255, 206, 0, 0.7); /* Ajoute un effet lumineux */
    }
    .card-item:hover .card-frame {
        border-color: #ff9500; /* Change la couleur du cadre au survol */
        box-shadow: 0 0 15px rgba(255, 149, 0, 0.9);
    }

    .no-cards {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
    }

</style>