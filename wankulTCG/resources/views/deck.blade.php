@extends('layouts.app')

@section('content')
    <style>
        .deck-container {
            display: flex;
            justify-content: space-between;
            padding: 20px;
        }

        .user-cards, .deck-manager {
            width: 48%;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .user-cards h2, .deck-manager h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .card-list {
            max-height: 400px;
            overflow-y: auto;
        }

        .card-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .card-item img {
            width: 60px;
            height: 90px;
            object-fit: cover;
            border-radius: 5px;
            margin-right: 15px;
        }

        .card-item .card-details {
            flex: 1;
        }

        .card-item .card-details span {
            display: block;
        }

        .card-item .add-button {
            padding: 5px 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .card-item .add-button:hover {
            background-color: #218838;
        }

        .deck-cards {
            display: flex;
            flex-direction: column;
            gap: 15px;
            padding: 10px;
            border: 1px dashed #ddd;
            border-radius: 5px;
            min-height: 300px;
            background-color: #fff;
        }

        .deck-card-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #e9ecef;
            border-radius: 5px;
        }

        .deck-card-item img {
            width: 60px;
            height: 90px;
            object-fit: cover;
            border-radius: 5px;
            margin-right: 15px;
        }

        .deck-card-item button {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .deck-card-item .remove-button {
            background-color: #dc3545;
            color: white;
        }

        .deck-card-item .remove-button:hover {
            background-color: #c82333;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    @include('nav_main')
    <div class="deck-container">
        <!-- Partie gauche : Cartes de l'utilisateur -->
        <div class="user-cards">
            <h2>Mes Cartes</h2>
            <div class="card-list">
                @foreach ($userCards as $card)
                    <div class="card-item">
                        <img src="{{ asset('storage/cards/' . $card->imageName) }}" alt="{{ $card->name_card }}">
                        <div class="card-details">
                            <span><strong>{{ $card->name_card }}</strong></span>
                            <span>Quantité : {{ $card->pivot->quantity }}</span>
                        </div>
                        <button class="add-button" onclick="addToDeck({{ $card->id_Card }}, '{{ $card->name_card }}', {{ $card->pivot->quantity }})">
                            Ajouter au Deck
                        </button>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Partie droite : Gestion du deck -->
        <div class="deck-manager">
            <h2>Mon Deck</h2>
            <div class="deck-cards" id="deck-cards">
                @foreach ($deckCards as $card)
                    <div class="deck-card-item" id="deck-card-{{ $card->id_Card }}">
                        <img src="{{ asset('storage/cards/' . $card->imageName) }}" alt="{{ $card->name_card }}">
                        <span>{{ $card->name_card }} (x{{ $card->pivot->quantity }})</span>
                        <button class="remove-button" onclick="removeFromDeck({{ $card->id_Card }})">Retirer</button>
                    </div>
                @endforeach
                @if($deckCards->isEmpty())
                    <p>Votre deck est vide.</p>
                @endif
            </div>
        </div>
    </div>

    <script>
        // Fonction pour ajouter une carte au deck
        function addToDeck(cardId, cardName, userQuantity) {
            fetch("{{ route('deck.addCard', ['id' => $deck->id_Deck]) }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ card_id: cardId })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Ajouter ou mettre à jour la carte dans le deck visuellement
                        const deckCards = document.getElementById('deck-cards');
                        const existingCard = document.getElementById(`deck-card-${cardId}`);

                        if (existingCard) {
                            // Si la carte existe déjà, on incrémente la quantité
                            const quantitySpan = existingCard.querySelector('span');
                            const currentQuantity = parseInt(quantitySpan.textContent.match(/\d+/)[0]);
                            quantitySpan.textContent = `${cardName} (x${currentQuantity + 1})`;
                        } else {
                            // Sinon, ajouter la carte dans le deck
                            const cardItem = document.createElement('div');
                            cardItem.className = 'deck-card-item';
                            cardItem.id = `deck-card-${cardId}`;
                            cardItem.innerHTML = `
                                <span>${cardName} (x1)</span>
                                <button class="remove-button" onclick="removeFromDeck(${cardId})">Retirer</button>
                            `;
                            deckCards.appendChild(cardItem);
                        }
                    }
                });
        }

        // Fonction pour retirer une carte du deck
        function removeFromDeck(cardId) {
            fetch("{{ route('deck.removeCard', ['id' => $deck->id_Deck]) }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ card_id: cardId })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Retirer ou mettre à jour la carte dans le deck visuellement
                        const cardItem = document.getElementById(`deck-card-${cardId}`);
                        const quantitySpan = cardItem.querySelector('span');
                        const currentQuantity = parseInt(quantitySpan.textContent.match(/\d+/)[0]);

                        if (currentQuantity > 1) {
                            // Réduire la quantité de 1
                            quantitySpan.textContent = quantitySpan.textContent.replace(/\d+/, currentQuantity - 1);
                        } else {
                            // Supprimer la carte du deck
                            cardItem.remove();
                        }
                    }
                });
        }
    </script>
@endsection
