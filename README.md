# 📦 Projet Laravel - Eat&Drink

**Groupe :**  
- **TOKPO Neal**  
- **Audrey**  
- **Herman**

## 📝 Répartition des Tâches

- **TOKPO Neal**  
  - Gestion de l'authentification (login, inscription)  
  - Tableau de bord administrateur : approbation des entrepreneurs  
  - Implémentation des rôles et autorisations
  - CRUD des produits pour les entrepreneurs 
  - Vitrine publique (liste des stands et produits) 
   
- **Audrey**  
  - Interface utilisateur pour le tableau de bord des entrepreneurs  
  - Formulaires et validation (ajout/modification de produit)

- **Herman**  
   
  - Fonctionnalité de panier et soumission de commandes  
  - Page de détails des stands et des produits

---

## 🍽️ Contexte du Projet

L'événement culinaire **Eat&Drink** rassemble de nombreux restaurateurs et artisans. Afin de digitaliser son organisation, une plateforme web a été développée pour gérer les inscriptions des exposants et la présentation de leurs produits au grand public.

---

## 🎯 Objectifs Pédagogiques

Ce projet vise à :

- Concevoir une application web complète avec Laravel
- Gérer plusieurs rôles et autorisations
- Implémenter des opérations CRUD
- Structurer une base de données relationnelle
- Offrir une interface utilisateur claire et intuitive

---

## ⚙️ Fonctionnalités Principales

### 🔐 Module 1 : Gestion des Utilisateurs

- **Visiteur (non connecté) :**
  - Voir la page d'accueil
  - Demander un stand
  - Se connecter

- **Entrepreneur :**
  - Statut "en attente" après inscription
  - Accès limité jusqu'à validation par l’admin
  - Tableau de bord avec gestion de ses produits

- **Administrateur :**
  - Approber ou refuser les demandes de stands
  - Gestion des comptes et supervision générale

### 🏪 Module 2 : Gestion des Stands

- Admin peut voir toutes les demandes
- Accepter ou refuser une demande avec justification

### 🛍️ Module 3 : Gestion des Produits

- Ajout, modification, suppression de produits
- Image, description, prix, etc.

### 🌐 Module 4 : Vitrine & Commandes

- Liste des stands approuvés
- Page publique pour chaque stand
- Ajout au panier et commande simple

---

## 🗃️ Modèle de Données

- **Utilisateurs** (`id`, `nom_entreprise`, `email`, `mot_de_passe`, `role`, ...)
- **Stands** (`id`, `nom_stand`, `description`, `utilisateur_id`)
- **Produits** (`id`, `nom`, `description`, `prix`, `image_url`, `stand_id`)
- **Commandes** (`id`, `stand_id`, `details_commande`, `date_commande`)

---

## 🚧 Étapes de Réalisation

1. Initialisation du projet et de la base
2. Authentification des utilisateurs
3. Tableau de bord administrateur
4. CRUD produits pour les entrepreneurs
5. Pages publiques (stands et produits)
6. Gestion des commandes
7. Recherche de stands/produits
8. Historique des commandes pour admin
9. Notifications par mail
10. Interface et messages 100% en français

---

## 🧰 Stack Technique

- **Backend** : Laravel
- **Frontend** : Blade + Bootstrap + JS
- **Base de données** : MySQL ou SQLite
- **Autres** : Laravel Breeze/Fortify pour auth (optionnel)

---

## ✅ Critères d'Évaluation

- Collaboration Git entre les membres
- Fonctionnalités complètes
- Gestion correcte des rôles et permissions
- Bonne expérience utilisateur
- Base de données bien pensée

---

## 🗂️ Structure du Projet (extrait)

