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
            <form action="{{ route('market', ['idClient' => $user->id]) }}" method="get">
                @csrf

                <label for="name">Nom</label>
                <input type="text" name="name" id="name" value="{{ $name }}">
                <button type="submit">Filtrer</button>
            </form>
        </div>
        <div class="liste-cartes">
            @foreach ($cards as $card)
                <div class="ensemble-carte">
                    <div class="carte">
                        <div class="front" style="background-image: url('{{ $card->image }}')"></div>
                    </div>
                    <div class="info-carte">
                        <h4>{{ $card->price }} €</h4>
                        <form action="{{ route('market.buy', ['idClient' => $user->id]) }}" method="post">
                            @csrf

                            <input type="hidden" name="card_id" value="{{ $card->id_Card }}">
                            <input type="hidden" name="name" value="{{ $name }}">
                            <button type="submit">Acheter</button>
                        </form>
                    </div>
                </div>
            @endforeach
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

    .liste-cartes {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        align-items: center;
        width: 100%;
        height: 100%;
    }

    .ensemble-carte {
        width: 17vw;
        height: max-content;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
    }

    .carte {
        width: 100%;
        height: 24vw;
        background-color: #000;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .front {
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
    }

    .info-carte {
        width: 100%;
        height: 5vw;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .info-carte * {
        margin: 3px;
    }

</style>