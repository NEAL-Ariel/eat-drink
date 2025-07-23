<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>En attente d'approbation - Eat&Drink</title>
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
        .btn-secondary {
            background: linear-gradient(90deg, #a18cd1 0%, #fbc2eb 100%);
            border: none;
            color: #fff;
            font-weight: 600;
        }
        .btn-secondary:hover {
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
    <div class="container mt-5 text-center">
        <div class="alert alert-info">
            <h2>Votre demande est en cours d'approbation</h2>
            <p>Un administrateur va examiner votre demande. Vous recevrez un email dès qu'elle sera validée.</p>
        </div>
        <a href="/" class="btn btn-secondary">Retour à l'accueil</a>
    </div>
</body>
</html> 