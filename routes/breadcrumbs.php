<?php

use Diglactic\Breadcrumbs\Breadcrumbs;

use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Accueil', route('home'));
});

// Accueil > Livre
Breadcrumbs::for('books.show', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Livres');
});

// Accueil > Ajouter un livre
Breadcrumbs::for('books.create', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('mes livres');
    $trail->push('nouveau');
});

// Accueil > Ajouter un livre
Breadcrumbs::for('books.create.step1', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('mes livres');
    $trail->push('nouveau');
    $trail->push('recherhce ISBN');
});


// Accueil > Recherche
Breadcrumbs::for('search', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('recherche');
});

// Accueil > Profil
Breadcrumbs::for('dashboard.indexAccount', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('profile');
    $trail->push('compte');
});

// Accueil > Profil
Breadcrumbs::for('dashboard.indexBooks', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('profile');
    $trail->push('mes livres');
});

// Accueil > Profil
Breadcrumbs::for('dashboard.indexOrders', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('profile');
    $trail->push('achats');
});

// Accueil > Profil > addresses
Breadcrumbs::for('addresses.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('profile', route('dashboard.index'));
    $trail->push('adresses', route('addresses.index'));
});

// Accueil > Profil > addresses > créer
Breadcrumbs::for('addresses.create', function (BreadcrumbTrail $trail) {
    $trail->parent('addresses.index');
    $trail->push('ajouter');
});

// Accueil > Profil > addresses > modifier
Breadcrumbs::for('addresses.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('addresses.index');
    $trail->push('modifier');
});


// Accueil > Cart
Breadcrumbs::for('cart.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('panier d\'achat');
});