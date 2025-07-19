<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $stand->nom_stand }} - Eat&Drink</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #a18cd1 0%, #f8fafc 100%);
            min-height: 100vh;
        }
        .card {
            transition: all 0.3s ease;
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            animation: fadeInUp 0.6s ease forwards;
            opacity: 0;
            transform: translateY(30px);
        }
        .card:nth-child(1) { animation-delay: 0.1s; }
        .card:nth-child(2) { animation-delay: 0.2s; }
        .card:nth-child(3) { animation-delay: 0.3s; }
        .card:nth-child(4) { animation-delay: 0.4s; }
        .card:nth-child(5) { animation-delay: 0.5s; }
        .card:nth-child(6) { animation-delay: 0.6s; }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }
        .card-img-top {
            /* transition: all 0.3s ease; */
        }
        .card-body {
            background: rgba(255,255,255,0.9);
            backdrop-filter: blur(10px);
        }
        .btn-success {
            background: linear-gradient(90deg, #28a745 0%, #20c997 100%);
            border: none;
            color: #fff;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-success:hover {
            background: linear-gradient(90deg, #218838 0%, #1ea085 100%);
            color: #fff;
            transform: translateY(-2px);
        }
        .btn-secondary {
            background: #6c757d;
            border: none;
            color: #fff;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-secondary:hover {
            background: #545b62;
            color: #fff;
            transform: translateY(-2px);
        }
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <a href="{{ route('exposants.index') }}" class="btn btn-secondary mb-3">&larr; Retour à la liste des exposants</a>
        <h2>{{ $stand->nom_stand }}</h2>
        <p class="text-muted">Par {{ $stand->user->nom_entreprise }}</p>
        <p>{{ $stand->description }}</p>
        <hr>
        <h4>Produits proposés</h4>
        <div class="row">
            @forelse ($stand->produits as $produit)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if ($produit->image_url)
                            <img src="{{ $produit->image_url }}" class="card-img-top" alt="Photo du produit">
                        @else
                            <img src="https://via.placeholder.com/300x200?text=Produit" class="card-img-top" alt="Photo du produit">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $produit->nom }}</h5>
                            <p class="card-text">{{ $produit->description }}</p>
                            <p class="fw-bold">Prix : {{ number_format($produit->prix, 2, ',', ' ') }} €</p>
                            <form method="POST" action="{{ url('/panier/ajouter') }}">
                                @csrf
                                <input type="hidden" name="produit_id" value="{{ $produit->id }}">
                                <button type="submit" class="btn btn-success">Ajouter au panier</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p>Aucun produit pour ce stand.</p>
            @endforelse
        </div>
    </div>
</body>
</html> 