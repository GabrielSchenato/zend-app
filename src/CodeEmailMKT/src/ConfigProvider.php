<?php

namespace CodeEmailMKT;

use CodeEmailMKT\Application\Action\Customer\CustomerCreatePageAction;
use CodeEmailMKT\Application\Action\Customer\CustomerListPageAction;
use CodeEmailMKT\Application\Action\Customer\CustomerUpdatePageAction;
use CodeEmailMKT\Application\Action\Customer\Factory\CustomerCreatePageFactory;
use CodeEmailMKT\Application\Action\Customer\Factory\CustomerListPageFactory;
use CodeEmailMKT\Application\Action\Customer\Factory\CustomerUpdatePageFactory;
use CodeEmailMKT\Application\Action\HomePageFactory;
use CodeEmailMKT\Application\Action\PingAction;

/**
 * The configuration provider for the App module
 *
 * @see https://docs.zendframework.com/zend-component-installer/
 */
class ConfigProvider
{
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     *
     * @return array
     */
    public function __invoke()
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates'    => $this->getTemplates(),
        ];
    }

    /**
     * Returns the container dependencies
     *
     * @return array
     */
    public function getDependencies()
    {
        return [
            'invokables' => [
                Action\PingAction::class => PingAction::class,
            ],
            'factories'  => [
                Action\HomePageAction::class => HomePageFactory::class,
                CustomerListPageAction::class => CustomerListPageFactory::class,
                CustomerCreatePageAction::class => CustomerCreatePageFactory::class,
                CustomerUpdatePageAction::class => CustomerUpdatePageFactory::class,
            ],
        ];
    }

    /**
     * Returns the templates configuration
     *
     * @return array
     */
    public function getTemplates()
    {
        return [
            'paths' => [
                'app'    => [__DIR__ . '/../templates/app'],
                'error'  => [__DIR__ . '/../templates/error'],
                'layout' => [__DIR__ . '/../templates/layout'],
            ],
        ];
    }
}
