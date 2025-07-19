<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commandes reçues - Eat&Drink</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Commandes reçues</h2>
        @if($commandes->count() > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Détails</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($commandes as $commande)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($commande->date_commande)->format('d/m/Y H:i') }}</td>
                            <td>
                                <ul>
                                    @foreach(json_decode($commande->details_commande, true) as $item)
                                        <li>
                                            {{ $item['nom'] }} x {{ $item['quantite'] }} à {{ number_format($item['prix'], 2, ',', ' ') }} €
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Aucune commande reçue pour le moment.</p>
        @endif
        <a href="{{ route('entrepreneur.dashboard') }}" class="btn btn-secondary mt-3">Retour au tableau de bord</a>
    </div>
</body>
</html> 