<?php

$router->get('', 'PagesController@home');
$router->get('add-product', 'PagesController@product');
$router->get('', 'ProductController@index');

$router->post('products', 'ProductController@store');
$router->post('delete-product', 'ProductController@delete');
