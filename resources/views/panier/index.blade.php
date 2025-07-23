<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Panier - Eat&Drink</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('components.back-home-arrow')
    <div class="container mt-5">
        <h2 class="mb-4">Mon Panier</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if(count($produits) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th>Prix unitaire</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($produits as $produit)
                        @php $sousTotal = $produit->prix * $panier[$produit->id]; $total += $sousTotal; @endphp
                        <tr>
                            <td>{{ $produit->nom }}</td>
                            <td>{{ $panier[$produit->id] }}</td>
                            <td>{{ number_format($produit->prix, 2, ',', ' ') }} €</td>
                            <td>{{ number_format($sousTotal, 2, ',', ' ') }} €</td>
                            <td>
                                <form method="POST" action="{{ route('panier.retirer') }}">
                                    @csrf
                                    <input type="hidden" name="produit_id" value="{{ $produit->id }}">
                                    <button type="submit" class="btn btn-danger btn-sm">Retirer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-end">Total</th>
                        <th>{{ number_format($total, 2, ',', ' ') }} €</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
            <form method="POST" action="{{ route('panier.commander') }}">
                @csrf
                <button type="submit" class="btn btn-success">Passer commande</button>
            </form>
        @else
            <p>Votre panier est vide.</p>
        @endif
        <a href="/exposants" class="btn btn-secondary mt-3">Continuer mes achats</a>
    </div>
</body>
</html> 