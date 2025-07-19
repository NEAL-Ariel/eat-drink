<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Produits - Eat&Drink</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Mes Produits</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <a href="{{ route('entrepreneur.produits.create') }}" class="btn btn-primary mb-3">Ajouter un produit</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($produits as $produit)
                    <tr>
                        <td>{{ $produit->nom }}</td>
                        <td>{{ $produit->description }}</td>
                        <td>{{ number_format($produit->prix, 2, ',', ' ') }} €</td>
                        <td>
                            @if($produit->image_url)
                                <img src="{{ asset($produit->image_url) }}" alt="Image" width="80">
                            @else
                                <span class="text-muted">Aucune</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('entrepreneur.produits.edit', $produit->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('entrepreneur.produits.delete', $produit->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce produit ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5">Aucun produit trouvé.</td></tr>
                @endforelse
            </tbody>
        </table>
        <a href="{{ route('entrepreneur.dashboard') }}" class="btn btn-secondary mt-3">Retour au tableau de bord</a>
    </div>
</body>
</html>
