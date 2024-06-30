<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/services', 'ServiceController::index');
// $routes->get("add-user","Sites::insertUser");
// $routes->get("update-user","Sites::updateUser");
// $routes->get("delete-user","Sites::deleteUser");
// $routes->get("search-user","Sites::SearchUser");
// $routes->get("getall-user","Sites::getUsers");

$routes->get('list-users','Sites::listUsers');
$routes->post('add-user','Sites::addUser');
$routes->put('update-user','Sites::updateUser');
$routes->delete('delete-user','Sites::deleteUser');

$routes->group('product',["namespace"=>"App\Controllers"], function ($routes) {
    $routes->post('add','ProductController::addProduct');
    $routes->get('list','ProductController::index');
    $routes->delete('delete','ProductController::deleteProduct');
    $routes->put('update','ProductController::updateProduct');
    $routes->put('addStock', 'ProductController::addStock');
});

$routes->group('order',["namespace"=>"App\Controllers"], function ($routes) {
    $routes->post('add','OrderController::addOrder');
    $routes->get('list','OrderController::index');
    $routes->delete('delete','OrderController::deleteOrder');
    $routes->put('update','OrderController::updateOrder');
});