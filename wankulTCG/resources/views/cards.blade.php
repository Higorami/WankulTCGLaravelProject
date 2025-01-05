<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Cartes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        .decks-container {
            width: 100%;
            max-width: 1200px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }
        .section-title {
            font-size: 1.5rem;
            color: #444;
            margin-bottom: 15px;
        }
        .decks-list {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .deck-item {
            background-color: #f9f9f9;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            padding: 10px 15px;
            width: 120px;
            text-align: center;
            font-size: 1rem;
            font-weight: bold;
            color: #555;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .deck-item:hover {
            background-color: #ffce00;
            color: #fff;
            transform: scale(1.05);
            border-color: #ff9500;
            box-shadow: 0 0 10px rgba(255, 149, 0, 0.5);
        }
        .page_content {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            background-color: #f4f4f9;
            flex-direction: column;
            align-items: center;
        }
        .cards-container {
            max-width: 1200px;
            margin: 20px auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* 3 colonnes */
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
            max-width: 150px; /* Limite la taille des images */
            height: auto;
            margin: 0 auto;
        }
        .card-info {
            margin-top: 10px;
            font-size: 14px;
            font-weight: bold;
            color: #333;
        }
        .card-info span {
            color: #555;
            font-size: 12px;
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
        .header {
            margin: 20px;
            text-align: center;
            color: #444;
        }
        .header h1 {
            font-size: 2rem;
        }
    </style>
</head>
<body>
<div class="bootstrap-wrapper">
    @include('nav_main')
</div>
<div class="page_content">
    <div class="decks-container">
        <h2 class="section-title">Mes Decks</h2>
        <div class="decks-list">
            @foreach ($decks as $deck)
                <a href="{{ route('decks.show', $deck->id_Deck) }}" class="deck-item">
                    {{ $deck->name_deck }}
                </a>
            @endforeach

            @for ($i = count($decks); $i < 5; $i++)
                <a href="{{ route('decks.create', ['index' => $i + 1]) }}" class="deck-item">
                    Deck vide
                </a>
            @endfor
        </div>
    </div>

</div>

    <div class="header">
        <h1>Mes Cartes</h1>
    </div>

    <div class="cards-container">
        @foreach($cards as $card)
            <div class="card-item">
                <div class="card-frame"></div> <!-- Cadre décoratif -->
                <img src="{{ asset('storage/cards/' . $card->imageName) }}" alt="{{ $card->name_card }}" class="card-image">
                <div class="card-info">
                    ({{ $card->pivot->quantity }}/3) {{ $card->name_card }}
                </div>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
