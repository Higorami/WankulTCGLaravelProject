@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Vos cartes</h1>

        @if($cards->isEmpty())
            <div class="alert alert-info">
                Vous ne possédez aucune carte pour le moment.
            </div>
        @else
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nom de la carte</th>
                    <th>Artiste</th>
                    <th>Rareté</th>
                    <th>Extension</th>
                    <th>Quantité</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cards as $card)
                    <tr>
                        <td>{{ $card->name_card }}</td>
                        <td>{{ $card->artiste->artiste_name ?? 'N/A' }}</td>
                        <td>{{ $card->rarete->rarete_name ?? 'N/A' }}</td>
                        <td>{{ $card->extension->name_extension ?? 'N/A' }}</td>
                        <td>{{ $card->pivot->quantity }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
