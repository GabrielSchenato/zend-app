<?php

namespace CodeEmailMKT;

use CodeEmailMKT\Application\Action\Customer\{
    CustomerCreatePageAction,
    CustomerDeletePageAction,
    CustomerListPageAction,
    CustomerUpdatePageAction
};
use CodeEmailMKT\Application\Action\Customer\Factory\{
    CustomerCreatePageFactory,
    CustomerDeletePageFactory,
    CustomerListPageFactory,
    CustomerUpdatePageFactory
};
use \CodeEmailMKT\Application\Action\Tag\{
    TagCreatePageAction,
    TagDeletePageAction,
    TagListPageAction,
    TagUpdatePageAction
};
use \CodeEmailMKT\Application\Action\Tag\Factory\{
    TagCreatePageFactory,
    TagDeletePageFactory,
    TagListPageFactory,
    TagUpdatePageFactory
};
use \CodeEmailMKT\Application\Action\Campaign\{
    CampaignCreatePageAction,
    CampaignDeletePageAction,
    CampaignListPageAction,
    CampaignUpdatePageAction,
    CampaignSenderPageAction,
    CampaignReportPageAction
};
use \CodeEmailMKT\Application\Action\Campaign\Factory\{
    CampaignCreatePageFactory,
    CampaignDeletePageFactory,
    CampaignListPageFactory,
    CampaignUpdatePageFactory,
    CampaignSenderPageFactory,
    CampaignReportPageFactory
};
use CodeEmailMKT\Application\Action\{
    LoginPageAction,
    LoginPageFactory,
    LogoutAction,
    LogoutFactory
};

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
            ],
            'factories'  => [
                LoginPageAction::class => LoginPageFactory::class,
                LogoutAction::class => LogoutFactory::class,
                CustomerListPageAction::class => CustomerListPageFactory::class,
                CustomerCreatePageAction::class => CustomerCreatePageFactory::class,
                CustomerUpdatePageAction::class => CustomerUpdatePageFactory::class,
                CustomerDeletePageAction::class => CustomerDeletePageFactory::class,
                TagListPageAction::class => TagListPageFactory::class,
                TagCreatePageAction::class => TagCreatePageFactory::class,
                TagUpdatePageAction::class => TagUpdatePageFactory::class,
                TagDeletePageAction::class => TagDeletePageFactory::class,
                CampaignListPageAction::class => CampaignListPageFactory::class,
                CampaignCreatePageAction::class => CampaignCreatePageFactory::class,
                CampaignUpdatePageAction::class => CampaignUpdatePageFactory::class,
                CampaignDeletePageAction::class => CampaignDeletePageFactory::class,
                CampaignSenderPageAction::class => CampaignSenderPageFactory::class,
                CampaignReportPageAction::class => CampaignReportPageFactory::class
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
