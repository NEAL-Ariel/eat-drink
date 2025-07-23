<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Entrepreneur - Eat&Drink</title>
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
            max-width: 550px;
            width: 100%;
            padding: 2.5rem 2rem;
            margin: 2rem auto;
            animation: slideInUp 0.7s cubic-bezier(.23,1.01,.32,1) both;
        }
        .btn-primary {
            background: linear-gradient(90deg, #a18cd1 0%, #fbc2eb 100%);
            border: none;
            color: #fff;
            font-weight: 600;
        }
        .btn-primary:hover {
            background: linear-gradient(90deg, #8f5de8 0%, #fbc2eb 100%);
            color: #fff;
        }
        h2 {
            color: #7c3aed;
            font-weight: bold;
        }
        @keyframes slideInUp {
            0% { opacity: 0; transform: translateY(60px); }
            100% { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    @include('components.back-home-arrow')
    <div class="glass-box">
        <h2 class="mb-4 text-center">Demande de stand - Inscription Entrepreneur</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ url('/register') }}">
            @csrf
            <div class="mb-3">
                <label for="nom_entreprise" class="form-label">Nom de l'entreprise</label>
                <input type="text" class="form-control" id="nom_entreprise" name="nom_entreprise" value="{{ old('nom_entreprise') }}" required autofocus>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Adresse email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">S'inscrire</button>
        </form>
        <div class="mt-3 text-center">
            <a href="{{ route('login') }}">Déjà inscrit ? Se connecter</a>
        </div>
    </div>
</body>
</html> 