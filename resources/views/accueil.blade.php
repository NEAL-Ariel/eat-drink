<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eat&Drink - Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --accent-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --glass-bg: rgba(255, 255, 255, 0.1);
            --glass-border: rgba(255, 255, 255, 0.2);
            --text-primary: #2d3748;
            --text-secondary: #4a5568;
            --text-light: #718096;
            --shadow-soft: 0 10px 40px rgba(0, 0, 0, 0.1);
            --shadow-hover: 0 20px 60px rgba(0, 0, 0, 0.15);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            color: var(--text-primary);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Sticky Navigation */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
            transform: translateY(-100%);
        }

        .navbar.visible {
            transform: translateY(0);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            background: var(--primary-gradient);
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="white" opacity="0.1"><polygon points="0,0 1000,100 1000,0"/></svg>');
            background-size: cover;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            animation: fadeInUp 1s ease-out;
        }

        .hero-title {
            font-size: clamp(2rem, 5vw, 3.5rem);
            font-weight: 800;
            color: white;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .hero-desc {
            font-size: clamp(1rem, 2.5vw, 1.4rem);
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 2rem;
            max-width: 600px;
        }

        .btn-modern {
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            border: none;
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow-soft);
        }

        .btn-modern::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s ease;
        }

        .btn-modern:hover::before {
            left: 100%;
        }

        .btn-modern:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-hover);
        }

        .btn-primary-modern {
            background: var(--secondary-gradient);
            color: white;
        }

        .btn-outline-modern {
            background: transparent;
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        .btn-outline-modern:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .btn-success-modern {
            background: var(--accent-gradient);
            color: white;
        }

        /* Glass Cards */
        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-soft);
            transition: all 0.3s ease;
        }

        .glass-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }

        /* Sections */
        .section {
            padding: 80px 0;
            position: relative;
        }

        .section-title {
            font-size: clamp(2rem, 4vw, 2.5rem);
            font-weight: 700;
            text-align: center;
            margin-bottom: 3rem;
            position: relative;
            color: var(--text-primary);
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--primary-gradient);
            border-radius: 2px;
        }

        /* Stats Cards */
        .stats-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            padding: 2rem;
            text-align: center;
            box-shadow: var(--shadow-soft);
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
        }

        .stats-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--primary-gradient);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .stats-card:hover::before {
            transform: scaleX(1);
        }

        .stats-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: var(--shadow-hover);
        }

        .stats-number {
            font-size: 3rem;
            font-weight: 800;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .stats-label {
            color: var(--text-secondary);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.9rem;
        }

        /* Product Cards */
        .product-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow-soft);
            transition: all 0.3s ease;
            border: none;
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-hover);
        }

        .product-card img {
            height: 250px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .product-card:hover img {
            transform: scale(1.1);
        }

        .product-card .card-body {
            padding: 1.5rem;
        }

        .product-card .card-title {
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 1rem;
        }

        .product-card .card-text {
            color: var(--text-secondary);
            margin-bottom: 1.5rem;
        }

        /* Testimonials */
        .testimonial-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: var(--shadow-soft);
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
            background-clip: padding-box;
            position: relative;
        }

        .testimonial-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            width: 4px;
            background: var(--primary-gradient);
            border-radius: 0 2px 2px 0;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }

        .testimonial-quote {
            font-size: 1.1rem;
            font-style: italic;
            color: var(--text-secondary);
            margin-bottom: 1rem;
            position: relative;
        }

        .testimonial-quote::before {
            content: '"';
            font-size: 4rem;
            color: var(--primary-gradient);
            position: absolute;
            top: -20px;
            left: -20px;
            font-family: Georgia, serif;
        }

        .testimonial-author {
            font-weight: 600;
            color: var(--text-primary);
        }

        /* Newsletter Section */
        .newsletter-section {
            background: var(--primary-gradient);
            color: white;
            padding: 60px 0;
            position: relative;
        }

        .newsletter-form {
            max-width: 500px;
            margin: 0 auto;
        }

        .newsletter-input {
            border: none;
            border-radius: 50px;
            padding: 15px 25px;
            font-size: 1rem;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            backdrop-filter: blur(10px);
        }

        .newsletter-input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .newsletter-input:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.3);
        }

        /* Footer */
        .footer {
            background: linear-gradient(135deg, #2d3748 0%, #1a202c 100%);
            color: white;
            padding: 40px 0 20px 0;
            position: relative;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: var(--primary-gradient);
        }

        .footer-link {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-link:hover {
            color: white;
        }

        .social-icons a {
            display: inline-block;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            text-align: center;
            line-height: 40px;
            margin: 0 5px;
            transition: all 0.3s ease;
        }

        .social-icons a:hover {
            background: var(--primary-gradient);
            transform: translateY(-3px);
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-fade-in {
            animation: fadeInUp 0.6s ease forwards;
        }

        .animate-slide-left {
            animation: slideInLeft 0.6s ease forwards;
        }

        .animate-slide-right {
            animation: slideInRight 0.6s ease forwards;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero {
                min-height: 80vh;
                padding: 2rem 0;
            }
            
            .section {
                padding: 60px 0;
            }
            
            .btn-modern {
                padding: 10px 25px;
                font-size: 0.9rem;
                margin-bottom: 1rem;
            }
            
            .stats-number {
                font-size: 2.5rem;
            }
        }

        /* Accessibility */
        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0;
        }

        /* Focus styles */
        .btn-modern:focus,
        .newsletter-input:focus {
            outline: 3px solid rgba(102, 126, 234, 0.5);
            outline-offset: 2px;
        }
    </style>
</head>
<body>
    <!-- Sticky Navigation -->
    <nav class="navbar navbar-expand-lg" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="/" aria-label="Retour à l'accueil">
                <i class="bi bi-cup-hot me-2"></i>Eat&Drink
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/" aria-label="Accueil">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('exposants.index') }}" aria-label="Voir tous les exposants">Exposants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}" aria-label="Se connecter">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}" aria-label="S'inscrire">Inscription</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero" role="banner">
        <div class="container">
            <div class="hero-content text-center">
                <h1 class="hero-title">Bienvenue à Eat&Drink, l'événement culinaire incontournable !</h1>
                <p class="hero-desc mx-auto">Découvrez les meilleurs talents culinaires, leurs produits artisanaux, et vivez une expérience gastronomique unique dans une atmosphère conviviale et authentique.</p>
                <div class="d-flex flex-wrap gap-3 justify-content-center">
                    <a href="{{ route('login') }}" class="btn btn-modern btn-outline-modern" aria-label="Se connecter à votre compte">
                        <i class="bi bi-person-lock me-2"></i>Se connecter
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-modern btn-primary-modern" aria-label="S'inscrire comme exposant">
                        <i class="bi bi-shop me-2"></i>S'inscrire comme exposant
                    </a>
                    <a href="{{ route('exposants.index') }}" class="btn btn-modern btn-success-modern" aria-label="Découvrir tous les exposants">
                        <i class="bi bi-eye me-2"></i>Voir les exposants
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- À propos -->
    <section class="section" id="about">
        <div class="container">
            <div class="glass-card animate-fade-in">
                <h2 class="section-title">À propos de l'événement</h2>
                <div class="row align-items-center">
                    <div class="col-lg-8 mx-auto text-center">
                        <p class="lead">Eat&Drink est une plateforme innovante qui met en relation les entrepreneurs du monde culinaire avec un public passionné. Notre mission : promouvoir la diversité gastronomique et offrir une visibilité exceptionnelle aux artisans locaux.</p>
                        <p>Rejoignez-nous pour découvrir des saveurs authentiques, rencontrer des créateurs passionnés et vivre une expérience culinaire inoubliable.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Chiffres clés -->
    <section class="section bg-light" id="stats">
        <div class="container">
            <h2 class="section-title">Eat&Drink en chiffres</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="stats-card animate-fade-in">
                        <div class="stats-number">42</div>
                        <div class="stats-label">Exposants</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stats-card animate-fade-in">
                        <div class="stats-number">128</div>
                        <div class="stats-label">Produits</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stats-card animate-fade-in">
                        <div class="stats-number">+1000</div>
                        <div class="stats-label">Visiteurs</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Exposants en vedette -->
    <section class="section" id="featured-exhibitors">
        <div class="container">
            <h2 class="section-title">Nos exposants à la une</h2>
            <div class="row g-4">
                @php
                    $stands = \App\Models\Stand::with('user')->whereHas('user', function($q) {
                        $q->where('role', 'entrepreneur_approuve')->where('statut', 'approuve');
                    })->take(3)->get();
                @endphp
                @forelse ($stands as $stand)
                    <div class="col-lg-4 col-md-6">
                        <div class="product-card animate-fade-in">
                            @php $image = optional($stand->produits->first())->image_url; @endphp
                            @if ($image)
                                <img src="{{ $image }}" class="card-img-top" alt="Photo du stand {{ $stand->nom_stand }}" loading="lazy">
                            @else
                                <img src="https://via.placeholder.com/400x250/667eea/ffffff?text=Stand" class="card-img-top" alt="Photo du stand {{ $stand->nom_stand }}" loading="lazy">
                            @endif
                            <div class="card-body">
                                <h3 class="card-title">{{ $stand->nom_stand }}</h3>
                                <p class="card-text">{{ Str::limit($stand->description, 100) }}</p>
                                <a href="{{ route('exposants.show', $stand->id) }}" class="btn btn-modern btn-primary-modern" aria-label="Voir le stand {{ $stand->nom_stand }}">
                                    <i class="bi bi-arrow-right me-2"></i>Découvrir
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center py-5">
                            <i class="bi bi-shop display-1 text-muted mb-3"></i>
                            <p class="lead text-muted">Aucun exposant à la une pour le moment.</p>
                        </div>
                    </div>
                @endforelse
            </div>
            <div class="text-center mt-5">
                <a href="{{ route('exposants.index') }}" class="btn btn-modern btn-success-modern" aria-label="Voir tous les exposants">
                    <i class="bi bi-grid-3x3-gap me-2"></i>Voir tous les exposants
                </a>
            </div>
        </div>
    </section>

    <!-- Témoignages -->
    <section class="section bg-light" id="testimonials">
        <div class="container">
            <h2 class="section-title">Ils parlent de nous</h2>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="testimonial-card animate-slide-left">
                        <p class="testimonial-quote">Une expérience incroyable, j'ai découvert des saveurs uniques et rencontré des artisans passionnés !</p>
                        <div class="testimonial-author">
                            <strong>Sophie</strong> - Visiteuse
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="testimonial-card animate-fade-in">
                        <p class="testimonial-quote">Grâce à Eat&Drink, mon stand a gagné en visibilité et j'ai fidélisé de nouveaux clients. Une plateforme exceptionnelle !</p>
                        <div class="testimonial-author">
                            <strong>Karim</strong> - Artisan exposant
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="testimonial-card animate-slide-right">
                        <p class="testimonial-quote">Organisation au top, interface simple et efficace. Je recommande vivement cet événement !</p>
                        <div class="testimonial-author">
                            <strong>Julie</strong> - Restauratrice
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="newsletter-section" id="newsletter">
        <div class="container">
            <div class="text-center">
                <h2 class="mb-4">Restez informé de nos actualités</h2>
                <p class="lead mb-4">Recevez en avant-première les nouveautés, les événements à venir et les coups de cœur de nos exposants.</p>
                <div class="newsletter-form">
                    <div class="input-group">
                        <input type="email" class="form-control newsletter-input" placeholder="Votre adresse email" aria-label="Adresse email pour la newsletter">
                        <button class="btn btn-modern btn-outline-modern" type="button" aria-label="S'abonner à la newsletter">
                            <i class="bi bi-envelope-check me-2"></i>S'abonner
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer" role="contentinfo">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-6 mb-3">
                    <h5>Navigation</h5>
                    <nav aria-label="Liens du pied de page">
                        <a href="/" class="footer-link me-3">Accueil</a>
                        <a href="{{ route('exposants.index') }}" class="footer-link me-3">Exposants</a>
                        <a href="{{ route('register') }}" class="footer-link me-3">S'inscrire</a>
                        <a href="{{ route('login') }}" class="footer-link">Connexion</a>
                    </nav>
                </div>
                <div class="col-md-6 text-md-end">
                    <h5>Suivez-nous</h5>
                    <div class="social-icons">
                        <a href="#" class="footer-link" aria-label="Facebook">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#" class="footer-link" aria-label="Instagram">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="#" class="footer-link" aria-label="Twitter">
                            <i class="bi bi-twitter"></i>
                        </a>
                        <a href="#" class="footer-link" aria-label="LinkedIn">
                            <i class="bi bi-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>
            <hr class="border-light">
            <div class="text-center">
                <p class="mb-0">&copy; {{ date('Y') }} Eat&Drink. Tous droits réservés. | 
                    <a href="#" class="footer-link">Mentions légales</a> | 
                    <a href="#" class="footer-link">Politique de confidentialité</a>
                </p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        // Sticky Navigation
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 100) {
                navbar.classList.add('visible');
            } else {
                navbar.classList.remove('visible');
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe all animated elements
        document.querySelectorAll('.animate-fade-in, .animate-slide-left, .animate-slide-right').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            observer.observe(el);
        });

        // Newsletter form
        document.querySelector('.newsletter-form button').addEventListener('click', function() {
            const email = document.querySelector('.newsletter-input').value;
            if (email) {
                alert('Merci pour votre inscription !');
                document.querySelector('.newsletter-input').value = '';
            }
        });
    </script>
</body>
</html>