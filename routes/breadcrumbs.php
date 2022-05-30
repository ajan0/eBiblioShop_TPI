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
Breadcrumbs::for('books.createWithEAN', function (BreadcrumbTrail $trail) {
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
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('profile');
});