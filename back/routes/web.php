<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// ========================== HOME ==========================

$router->get(
    '/', // url
    [
        'uses' => 'MainController@home', // nomDuController@NomDeLaMethode
        'as'   => 'main-home' // nom de la route
    ]
);

// ========================== CATEGORIES ==========================
// ========= GET ALL =========
//Endpoint /categories : nous donne toute les categories
$router->get(
    '/categories',
    [
        'uses' => 'CategoryController@list',
        'as'   => 'category-list'
    ]
);
// ========= GET ID =========
//Endpoint /categories/unId : nous donne les infos de la categories numéro "unId"
$router->get(
    '/categories/{id}',
    [
        'uses' => 'CategoryController@item',
        'as'   => 'category-item'
    ]
);
// ========= POST AJOUT =========
//Endpoint /categories : Ajout d'une categorie Post
$router->post(
    '/categories',
    [
        'uses' => 'CategoryController@create',
        'as'   => 'category-create'
    ]
);
// ========= PUT MODIF ALL =========
//Endpoint /categories/unId : Modification d'une catégorie Put
$router->put(
    '/categories/{id}',
    [
        'uses' => 'CategoryController@update',
        'as'   => 'category-update'
    ]
);
// ========= PATCH MODIF UNIQUE =========
//Endpoint /categories/unId : Modification d'une partie de la Catégorie Patch
$router->patch(
    '/categories/{id}',
    [
        'uses' => 'CategoryController@update',
        'as'   => 'category-update'
    ]
);
// ========= DELETE =========
//Endpoint /categories/unId : Suppression d'une Catégorie
$router->delete(
    '/categories/{id}',
    [
        'uses' => 'CategoryController@delete',
        'as'   => 'category-delete'
    ]
);

// ========================== TASKS ==========================
// ========= GET ALL =========
//Endpoint /tasks : nous donne toute les tasks
$router->get(
    '/tasks',
    [
        'uses' => 'TaskController@list',
        'as'   => 'task-list'
    ]
);
// ========= GET ID =========
//Endpoint /tasks/unId : nous donne les infos de la task numéro "unId"
$router->get(
    '/tasks/{id}',
    [
        'uses' => 'TaskController@item',
        'as'   => 'task-item'
    ]
);
// ========= POST AJOUT =========
//Endpoint /tasks : Ajout d'une tache Post
$router->post(
    '/tasks',
    [
        'uses' => 'TaskController@create',
        'as'   => 'task-create'
    ]
);
// ========= PUT MODIF ALL =========
//Endpoint /tasks/unId : Modification d'une tache Put
$router->put(
    '/tasks/{id}',
    [
        'uses' => 'TaskController@update',
        'as'   => 'task-update'
    ]
);
// ========= PATCH MODIF UNIQUE =========
//Endpoint /tasks/unId : Modification d'une partie de la tache Patch
$router->patch(
    '/tasks/{id}',
    [
        'uses' => 'TaskController@update',
        'as'   => 'task-update'
    ]
);
// ========= DELETE =========
//Endpoint /taskss/unId : Suppression d'une tache
$router->delete(
    '/tasks/{id}',
    [
        'uses' => 'TaskController@delete',
        'as'   => 'task-delete'
    ]
);

