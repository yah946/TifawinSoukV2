# 🛒 TifawinSouk – Plateforme de Gestion Commerciale

## 📌 Présentation du Projet

**TifawinSouk** est une PME marocaine spécialisée dans le commerce local.  
Dans le cadre de sa transformation digitale, l’entreprise souhaite développer une application web permettant de :

- Gérer son catalogue de produits
- Administrer les fournisseurs
- Suivre les commandes clients
- Offrir une vitrine publique pour les clients

Ce projet est réalisé avec **Laravel (dernière version stable)** et respecte les bonnes pratiques de développement (architecture MVC, Eloquent ORM, validation, sécurité, transactions SQL).

---

# 🎯 Objectifs du Projet

L’application comporte **deux espaces principaux** :

## 🔐 Back-Office (Admin)
- Gestion centralisée du stock
- Gestion des catégories et fournisseurs
- Suivi des commandes
- Tableau de bord (stock critique)

## 🌍 Front-Office (Client)
- Consultation du catalogue
- Recherche et filtrage
- Gestion du panier
- Passage de commande
- Suivi des commandes

---

# ⚙️ Fonctionnalités

## 🧑‍💼 Espace Admin

### 🔑 Authentification
- Connexion sécurisée via Laravel Breeze/UI
- Accès restreint aux routes `/admin`
- Middleware de protection (role: admin)

### 📦 Gestion du Catalogue

#### Catégories
- CRUD
    - nom
    - slug
    - description

#### Produits
- CRUD
    - nom (obligatoire)
    - référence unique (obligatoire)
    - description
    - prix (min: 0)
    - stock
    - image (jpeg/png/jpg – max 2Mo)
    - catégorie (relation 1:N)
    - fournisseur (relation 1:N)
    - Soft Delete (archivage)

### 🏢 Gestion des Fournisseurs
- CRUD
    - nom
    - email (unique)
    - ville
    - téléphone
- Relation 1:N avec Produits

### 📊 Tableau de Bord
- Affichage des produits avec stock critique
- Vue globale des commandes
- Modification du statut :
    - En attente
    - Expédiée
    - Livrée
    - Annulée

---

## 👤 Espace Client

### 📝 Authentification
- Inscription
- Connexion
- Gestion du profil :
    - adresse
    - téléphone

### 🛍 Navigation & Recherche
- Consultation des catégories
- Filtrage des produits par catégorie
- Recherche par nom
- Fiche produit :
    - image
    - prix
    - disponibilité

### 🛒 Panier
- Ajout de produits
- Modification des quantités
- Vérification du stock
- Message d’erreur si quantité > stock

### 📦 Commande
- Validation uniquement si utilisateur authentifié
- Enregistrement :
    - identité client
    - liste des produits
    - prix figé au moment de l’achat
    - total calculé
    - statut
- Transaction SQL pour :
    - enregistrer la commande
    - décrémenter le stock
    - garantir atomicité

### 📜 Historique
- Consultation des commandes
- Suivi du statut

---

# 🗂 Modélisation des Données

## Relations Eloquent

- 1:N → Catégorie → Produits
- 1:N → Fournisseur → Produits
- 1:N → Utilisateur → Commandes
- N:N → Commandes ↔ Produits (table pivot : `order_product`)

---

# 🔒 Contraintes Techniques

## ✅ Validation
- Prix ≥ 0
- Email valide
- Référence produit unique
- Email utilisateur/fournisseur unique
- Champs obligatoires : nom, prix, catégorie, fournisseur
- Image validée (type + taille)

## 🔐 Sécurité
- Middleware pour protéger `/admin`
- Authentification Laravel
- Protection CSRF
- Validation côté serveur
