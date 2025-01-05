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
    <div class="liste-booster">
        @foreach ($extensions as $extension)
            <a href="{{ route('booster.open', ['idExtension' => $extension->id_Extension]) }}">
                <div class="booster booster-{{ $extension->id_Extension }}" style="background-image: url('booster-{{ $extension->id_Extension }}.png')">
                    <h2>{{ $extension->name_extension }}</h2>
                </div>
            </a>
        @endforeach
    </div>
</div>

</body>

<style>

    .liste-booster {
        display: flex;
        justify-content: space-around;
        align-items: center;
        width: 100%;
        height: 100%;
    }

    .booster {
        width: 200px;
        height: 300px;
        background-color: #000;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    h2 {
        height: 50px;
        width: 100%;
        background-color: #000;
        text-align: center;
        color: #fff;
        z-index: 1;
    }

</style>
