<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Eat&Drink</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('components.back-home-arrow')
    <div class="container mt-5">
        <h2>Tableau de bord Administrateur</h2>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card text-bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Utilisateurs</h5>
                        <p class="card-text display-6">{{ $nbUsers }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Stands</h5>
                        <p class="card-text display-6">{{ $nbStands }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Commandes</h5>
                        <p class="card-text display-6">{{ $nbCommandes }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <a href="{{ route('admin.demandes') }}" class="btn btn-primary me-2">Demandes de stands</a>
            <a href="{{ route('admin.commandes') }}" class="btn btn-success">Commandes des stands</a>
        </div>
    </div>
</body>
</html> 