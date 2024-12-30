<div>
    <div class="liste-booster">
        @for ($i = 0; $i < 5; $i++)
            <div class="booster booster-{{ $i + 1 }}" style="background-image: url('booster-{{ $i + 1 }}.png')">
                <h2>Booster n°{{ $i + 1 }}</h2>
            </div>
        @endfor
    </div>
</div>

<style>

    .liste-booster {
        display: flex;
        justify-content: space-between;
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
        position: absolute;
        bottom: 0;
        z-index: 1;
    }

</style>
