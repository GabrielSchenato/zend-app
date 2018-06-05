<?php

use CodeEmailMKT\Application\Action\Customer\CustomerCreatePageAction;
use CodeEmailMKT\Application\Action\Customer\CustomerDeletePageAction;
use CodeEmailMKT\Application\Action\Customer\CustomerListPageAction;
use CodeEmailMKT\Application\Action\Customer\CustomerUpdatePageAction;
use CodeEmailMKT\Application\Action\LoginPageAction;
use CodeEmailMKT\Application\Action\LogoutAction;
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

$app->route('/auth/login', LoginPageAction::class, ['GET', 'POST',], 'auth.login');
$app->get('/auth/logout', LogoutAction::class, 'auth.logout');

$app->get('/admin/customers', CustomerListPageAction::class, 'list.customers');
$app->route('/admin/customer/create', CustomerCreatePageAction::class, ['GET', 'POST',], 'customer.create');
$app->route('/admin/customer/update/{id}', CustomerUpdatePageAction::class, ['GET', 'PUT',], 'customer.update')->setOptions([
        'tokens' => ['id' => '\d+'],
    ]);
$app->route('/admin/customer/delete/{id}', CustomerDeletePageAction::class, ['GET', 'DELETE',], 'customer.delete')->setOptions([
        'tokens' => ['id' => '\d+'],
    ]);