<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord Entrepreneur - Eat&Drink</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #a18cd1 0%, #f8fafc 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .glass-box {
            background: rgba(255,255,255,0.8);
            border-radius: 25px;
            box-shadow: 0 8px 32px 0 rgba(161, 140, 209, 0.18);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(161,140,209,0.18);
            max-width: 600px;
            width: 100%;
            padding: 2.5rem 2rem;
            margin: 2rem auto;
        }
        .btn-primary, .btn-success {
            background: linear-gradient(90deg, #a18cd1 0%, #fbc2eb 100%);
            border: none;
            color: #fff;
            font-weight: 600;
        }
        .btn-primary:hover, .btn-success:hover {
            background: linear-gradient(90deg, #8f5de8 0%, #fbc2eb 100%);
            color: #fff;
        }
        h2 {
            color: #7c3aed;
            font-weight: bold;
        }
    </style>
</head>
<body>
    @include('components.back-home-arrow')
    <div class="container mt-5">
        <h2>Bienvenue, {{ $user->nom_entreprise }}</h2>
        <p class="lead">Vous êtes connecté en tant qu'entrepreneur approuvé.</p>
        <div class="mt-4">
            <a href="{{ route('entrepreneur.produits') }}" class="btn btn-primary me-2">Mes Produits</a>
            <a href="{{ route('entrepreneur.commandes') }}" class="btn btn-success">Commandes reçues</a>
        </div>
    </div>
</body>
</html> 