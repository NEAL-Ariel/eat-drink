<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un produit - Eat&Drink</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Modifier le produit</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('entrepreneur.produits.update', $produit->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nom" class="form-label">Nom du produit</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $produit->nom) }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description">{{ old('description', $produit->description) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="prix" class="form-label">Prix (€)</label>
                <input type="number" step="0.01" class="form-control" id="prix" name="prix" value="{{ old('prix', $produit->prix) }}" required>
            </div>
            <div class="mb-3">
                <label for="image_url" class="form-label">Image du produit</label>
                @if($produit->image_url)
                    <div class="mb-2"><img src="{{ asset($produit->image_url) }}" alt="Image actuelle" width="120"></div>
                @endif
                <input type="file" class="form-control" id="image_url" name="image_url" accept="image/*">
                <small class="form-text text-muted">Laisse vide pour conserver l'image actuelle.</small>
            </div>
            <button type="submit" class="btn btn-success">Enregistrer</button>
            <a href="{{ route('entrepreneur.produits') }}" class="btn btn-secondary ms-2">Annuler</a>
        </form>
    </div>
</body>
</html> 