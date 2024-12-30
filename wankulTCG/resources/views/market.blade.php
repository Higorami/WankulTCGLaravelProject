<div>
    <div class="market">
        <div class="filtre">
            <form action="????????" method="get">
                <label for="name">Nom</label>
                <input type="text" name="name" id="name">
                <button type="submit">Filtrer</button>
            </form>
        </div>
        <div class="liste-cartes">
            @foreach ($cards as $card)
                <div class="carte">
                    <div class="front" style="background-image: url('{{ $card->image }}')"></div>
                </div>
                <div class="info-carte">
                    <h2>{{ $card->name }}</h2>
                    <p>{{ $card->description }}</p>
                    <p>{{ $card->price }} €</p>
                    <form action="?????????????????" method="get">
                        <input type="hidden" name="card_id" value="{{ $card->id }}">
                        <button type="submit">Acheter</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</div>
