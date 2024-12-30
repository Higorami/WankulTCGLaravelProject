<div>
    <div class="liste-cartes">
        @for ($i = 0; $i < 6; $i++)
            <div class="carte carte-{{ $i + 1 }}">
                <div class="front" style="background-image: url('carte-{{ $i + 1 }}.png')">
                </div>
                <div class="back" style="background-image: url('dos-carte.png')">
                </div>
            </div>
        @endfor
    </div>
</div>

<style>

    .liste-cartes {
        display: flex;
        justify-content: space-between;
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
        transform: rotateY(180deg);
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