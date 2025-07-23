<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Exposants - Eat&Drink</title>
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
        .btn-primary {
            background: linear-gradient(90deg, #a18cd1 0%, #fbc2eb 100%);
            border: none;
            color: #fff;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: linear-gradient(90deg, #8f5de8 0%, #fbc2eb 100%);
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
    @include('components.back-home-arrow')
    <div class="container mt-5">
        <h2 class="mb-4">Nos Exposants</h2>
        <div class="row">
            @forelse ($stands as $stand)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @php
                            $image = optional($stand->produits->first())->image_url;
                        @endphp
                        @if ($image)
                            <img src="{{ $image }}" class="card-img-top" alt="Photo du stand">
                        @else
                            <img src="https://via.placeholder.com/300x200?text=Stand" class="card-img-top" alt="Photo du stand">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $stand->nom_stand }}</h5>
                            <p class="card-text">{{ $stand->description }}</p>
                            <a href="{{ url('/exposants/'.$stand->id) }}" class="btn btn-primary">Voir le stand</a>
                        </div>
                    </div>
                </div>
            @empty
                <p>Aucun exposant approuvé pour le moment.</p>
            @endforelse
        </div>
        <a href="/" class="btn btn-secondary mt-3">Retour à l'accueil</a>
    </div>
</body>
</html> 