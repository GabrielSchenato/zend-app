<?php

use CodeEmailMKT\Application\Action\Customer\CustomerCreatePageAction;
use CodeEmailMKT\Application\Action\Customer\CustomerListPageAction;
use CodeEmailMKT\Application\Action\Customer\CustomerUpdatePageAction;
use Zend\Expressive\Application;
/**
 * Setup routes with a single request method:
 *
 * $app->get('/', App\Action\HomePageAction::class, 'home');
 * $app->post('/album', App\Action\AlbumCreateAction::class, 'album.create');
 * $app->put('/album/:id', App\Action\AlbumUpdateAction::class, 'album.put');
 * $app->patch('/album/:id', App\Action\AlbumUpdateAction::class, 'album.patch');
 * $app->delete('/album/:id', App\Action\AlbumDeleteAction::class, 'album.delete');
 *
 * Or with multiple request methods:
 *
 * $app->route('/contact', App\Action\ContactAction::class, ['GET', 'POST', ...], 'contact');
 *
 * Or handling all request methods:
 *
 * $app->route('/contact', App\Action\ContactAction::class)->setName('contact');
 *
 * or:
 *
 * $app->route(
 *     '/contact',
 *     App\Action\ContactAction::class,
 *     Zend\Expressive\Router\Route::HTTP_METHOD_ANY,
 *     'contact'
 * );
 */

/** @var Application $app */

$app->get('/', CodeEmailMKT\Action\HomePageAction::class, 'home');
$app->get('/api/ping', CodeEmailMKT\Action\PingAction::class, 'api.ping');

$app->get('/admin/customers', CustomerListPageAction::class, 'list.customers');
$app->route('/admin/customer/create', CustomerCreatePageAction::class, ['GET', 'POST',], 'customer.create');
$app->route('/admin/customer/update/{id}', CustomerUpdatePageAction::class, ['GET', 'POST',], 'customer.update')->setOptions([
        'tokens' => ['id' => '\d+'],
    ]);