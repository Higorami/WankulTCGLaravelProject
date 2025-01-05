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
    <h1>Booster opening</h1>
    <div class="liste-cartes">
        @foreach ($cards as $i => $card)
            <div class="carte carte-{{ $i + 1 }}">
                <div class="front">
                    <img src="{{ asset('storage/cards/' . $card->imageName) }}" alt="{{ $card->name_card }}" class="card-image">
                    @if ($card->sell)
                        <h4>Vendue</h4>
                    @endif
                </div>
                <div class="back" style="background-image: url('dos-carte.png')">
                    <img src="{{ asset('storage/cards/dos-carte.png') }}" alt="Dos de carte" class="card-image">
                </div>
            </div>
        @endforeach
    </div>
    <div class="continuer-opening">
        <a href="{{ route('booster.list') }}">
            Continuer
        </a>
    </div>
</div>

</body>

<style>

    h1 {
        text-align: center;
        margin: 20px 0;
    }

    .liste-cartes {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        align-items: center;
        width: 60%;
        height: 100%;
        margin: 0 auto;
    }

    .carte {
        width: 15vw;
        height: 22.5vw;
        margin: 30px 10px;
        /* perspective: 1000px; */
        transform: rotateY(180deg);
		transition: transform 0.4s;
		transform-style: preserve-3d;
    }

    .front, .back {
        width: 100%;
        height: 100%;
        position: absolute;
        backface-visibility: hidden;
    }

    .back {
        background-color: blue;
        transform: rotateY(180deg);
    }

    .card-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    h4 {
        height: 30px;
        width: 100%;
        background-color: #000;
        text-align: center;
        color: #fff;
        z-index: 1;
    }

    .continuer-opening {
        width: 20vw;
        justify-content: center;
        align-items: center;
        text-align: center;
        margin-top: 50px;
        margin-left: 40vw;
        font-size: 3rem;
    }

    .continuer-opening a{
        color: #000;
        transition: all 0.4s ease-in-out;
    }

    .continuer-opening a:hover{
        color: #ff9500;
    }

    /* animation au lancement */

    .carte-1 {
        animation: flip 0.4s 0.1s forwards;
    }

    .carte-2 {
        animation: flip 0.4s 0.3s forwards;
    }

    .carte-3 {
        animation: flip 0.4s 0.5s forwards;
    }

    .carte-4 {
        animation: flip 0.4s 0.7s forwards;
    }

    .carte-5 {
        animation: flip 0.4s 0.9s forwards;
    }

    .carte-6 {
        animation: flip 0.4s 1.1s forwards;
    }

    @keyframes flip {
        from {
            transform: rotateY(180deg);
        }
        to {
            transform: rotateY(0deg);
        }
    }

</style>