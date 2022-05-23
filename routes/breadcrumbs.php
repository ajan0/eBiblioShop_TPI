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

// Accueil > Recherche
Breadcrumbs::for('search', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Recherche');
});

// Accueil > Profil
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Profile');
});