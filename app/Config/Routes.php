<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 $routes->get('/', 'Home::index');
 $routes->get('/', 'LoginController::index');
 $routes->get('login','LoginController::connect');
 $routes->get('signIn', 'LoginController::inscrire');
 $routes->get('book/delete/(:num)', 'Home::delete/$1'); // $1 = nombre de paramètre du fonction delete
 $routes->get('addBook(:num)', 'Home::edit/$1');
 $routes->get('addBook','Home::book');
 $routes->get('loginAdmin','LoginController::connect');
//  $routes->get('librairy','Home::liste');
 $routes->get('listeBook','Home::liste');
 $routes->get('listeCommand','LoginController::command');
 $routes->get('bookUser(:num)','Home::bookUser/$1');
 $routes->get('commander(:num)/(:num)','commandController::addCommand/$1/$2');
 $routes->get('logout','LoginController::logout');
 $routes->get('logoutAdmin','LoginController::logoutAdmin');
 $routes->get('accepter(:num)','CommandController::accept/$1');
 $routes->get('refuser(:num)','CommandController::refuser/$1');


 $routes->post('signIn', 'LoginController::signIn');
 $routes->post('login','LoginController::login');
 $routes->post('loginAdmin','LoginController::loginAdmin');
 $routes->post('addBook','Home::enregistrer');
 $routes->post('addBook(:num)','Home::update/$1');
 $routes->post('bookUser(:num)','Home::search/$1');
 $routes->post('listeBook','Home::searchAdmin');
 $routes->post('listeCommand','CommandController::searchCommand');