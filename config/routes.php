<?php

use CodeEmailMKT\Application\Action\Customer\{
    CustomerCreatePageAction, CustomerDeletePageAction, CustomerListPageAction, CustomerUpdatePageAction    
};
use CodeEmailMKT\Application\Action\Tag\{
    TagCreatePageAction, TagDeletePageAction, TagListPageAction, TagUpdatePageAction    
};
use CodeEmailMKT\Application\Action\Campaign\{
    CampaignCreatePageAction, CampaignDeletePageAction, CampaignListPageAction, CampaignUpdatePageAction    
};
use CodeEmailMKT\Application\Action\{
    LoginPageAction, LogoutAction    
};
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

$app->route('/auth/login', LoginPageAction::class, ['GET', 'POST',], 'auth.login');
$app->get('/auth/logout', LogoutAction::class, 'auth.logout');

$app->get('/', CustomerListPageAction::class, 'home');
$app->get('/admin/customers', CustomerListPageAction::class, 'list.customers');
$app->route('/admin/customer/create', CustomerCreatePageAction::class, ['GET', 'POST',], 'customer.create');
$app->route('/admin/customer/update/{id}', CustomerUpdatePageAction::class, ['GET', 'PUT',], 'customer.update')->setOptions([
        'tokens' => ['id' => '\d+'],
    ]);
$app->route('/admin/customer/delete/{id}', CustomerDeletePageAction::class, ['GET', 'DELETE',], 'customer.delete')->setOptions([
        'tokens' => ['id' => '\d+'],
    ]);

$app->get('/admin/tags', TagListPageAction::class, 'list.tags');
$app->route('/admin/tag/create', TagCreatePageAction::class, ['GET', 'POST',], 'tag.create');
$app->route('/admin/tag/update/{id}', TagUpdatePageAction::class, ['GET', 'PUT',], 'tag.update')->setOptions([
        'tokens' => ['id' => '\d+'],
    ]);
$app->route('/admin/tag/delete/{id}', TagDeletePageAction::class, ['GET', 'DELETE',], 'tag.delete')->setOptions([
        'tokens' => ['id' => '\d+'],
    ]);

$app->get('/admin/campaigns', CampaignListPageAction::class, 'list.campaigns');
$app->route('/admin/campaign/create', CampaignCreatePageAction::class, ['GET', 'POST',], 'campaign.create');
$app->route('/admin/campaign/update/{id}', CampaignUpdatePageAction::class, ['GET', 'PUT',], 'campaign.update')->setOptions([
        'tokens' => ['id' => '\d+'],
    ]);
$app->route('/admin/campaign/delete/{id}', CampaignDeletePageAction::class, ['GET', 'DELETE',], 'campaign.delete')->setOptions([
        'tokens' => ['id' => '\d+'],
    ]);