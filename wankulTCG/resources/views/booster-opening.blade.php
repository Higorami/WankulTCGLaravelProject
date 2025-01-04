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
                <div class="front" style="background-image: url('carte-{{ $card->id_Card }}.png')">
                    @if ($card->sell)
                        <h4>Vendue</h4>
                    @endif
                </div>
                <div class="back" style="background-image: url('dos-carte.png')">
                </div>
            </div>
        @endforeach
    </div>
</div>

</body>

<style>

    .liste-cartes {
        display: flex;
        justify-content: space-around;
        align-items: center;
        width: 100%;
        height: 100%;
    }

    .carte {
        width: 200px;
        height: 300px;
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

    .front {
        background-color: red;
    }

    h4 {
        height: 30px;
        width: 100%;
        background-color: #000;
        text-align: center;
        color: #fff;
        z-index: 1;
    }

    /* animation au lancement */

    .carte-1 {
        animation: flip 0.4s 0.1s forwards;
    }

    .carte-2 {
        animation: flip 0.4s 0.2s forwards;
    }

    .carte-3 {
        animation: flip 0.4s 0.3s forwards;
    }

    .carte-4 {
        animation: flip 0.4s 0.4s forwards;
    }

    .carte-5 {
        animation: flip 0.4s 0.5s forwards;
    }

    .carte-6 {
        animation: flip 0.4s 0.6s forwards;
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