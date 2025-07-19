<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commandes des stands - Eat&Drink</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Commandes de tous les stands</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Exposant</th>
                    <th>Stand</th>
                    <th>Détails</th>
                </tr>
            </thead>
            <tbody>
                @forelse($commandes as $commande)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($commande->date_commande)->format('d/m/Y H:i') }}</td>
                        <td>{{ $commande->stand->user->nom_entreprise ?? '-' }}</td>
                        <td>{{ $commande->stand->nom_stand ?? '-' }}</td>
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
                @empty
                    <tr><td colspan="4">Aucune commande trouvée.</td></tr>
                @endforelse
            </tbody>
        </table>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-3">Retour au dashboard</a>
    </div>
</body>
</html> 