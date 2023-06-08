<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('article_types', article_typeController::class);
    $router->resource('articles', articleController::class);
    $router->resource('custom-tables', DetailsController::class);
    $router->resource('the_tables', theTableController::class);
    $router->resource('the_table-relations', theTableRelationController::class);
    $router->resource('products', productController::class);
    $router->resource('categories', categoryController::class);
    $router->resource('both-relations', bothRelationController::class);

    $router->resource('maindatas', maindController::class);
    $router->resource('belowdatas', belowdController::class);
    $router->resource('datasubs', subdController::class);
    $router->resource('alldatas', alldController::class);
   

    
   


});
