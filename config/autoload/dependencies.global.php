<?php

use CodeEdu\FixtureFactory;
use CodeEmailMKT\Application\Middleware\{
  AuthenticationMiddleware,
  AuthenticationMiddlewareFactory,
  BootstrapMiddleware,
  BootstrapMiddlewareFactory,
  TwigMiddleware,
  TwigMiddlewareFactory  
};
use CodeEmailMKT\Domain\Service\{AuthInterface, FlashMessageInterface, CampaignEmailServiceInterface, CampaignReportInterface};
use CodeEmailMKT\Infrastructure\Service\Factory\{AuthServiceFactory, FlashMessageFactory, MailgunFactory, CampaignEmailSenderFactory, CampaignReportFactory};
use CodeEmailMKT\Domain\Persistence\{
    CustomerRepositoryInterface, TagRepositoryInterface, CampaignRepositoryInterface
};
use CodeEmailMKT\Domain\Persistence\Criteria\{
    FindByNameCriteriaInterface, FindByIdCriteriaInterface    
};
use CodeEmailMKT\Infrastructure\Persistence\Doctrine\Repository\Criteria\{
    FindByNameCriteria, FindByIdCriteria    
};
use CodeEmailMKT\Infrastructure\Persistence\Doctrine\Repository\{
    CustomerRepositoryFactory, TagRepositoryFactory, CampaignRepositoryFactory
};
use Zend\Expressive\{
  Application,
  Container,
  Delegate,
  Helper,
  Middleware
};
use Zend\Authentication\AuthenticationService;
use Zend\Stratigility\Middleware\ErrorHandler;

return [
    // Provides application-wide services.
    // We recommend using fully-qualified class names whenever possible as
    // service names.
    'dependencies' => [
        // Use 'aliases' to alias a service name to another service. The
        // key is the alias name, the value is the service to which it points.
        'aliases' => [
            'Zend\Expressive\Delegate\DefaultDelegate' => Delegate\NotFoundDelegate::class,
            'Configuration' => 'config', //Doctrine needs a service called Configuration
            'Config' => 'config', //Doctrine needs a service called Configuration
            AuthenticationService::class => 'doctrine.authenticationservice.orm_default'
        ],
        // Use 'invokables' for constructor-less services, or services that do
        // not require arguments to the constructor. Map a service name to the
        // class name.
        'invokables' => [
            // Fully\Qualified\InterfaceName::class => Fully\Qualified\ClassName::class,
            Helper\ServerUrlHelper::class => Helper\ServerUrlHelper::class,
            FindByNameCriteriaInterface::class => FindByNameCriteria::class,
            FindByIdCriteriaInterface::class => FindByIdCriteria::class
        ],
        // Use 'factories' for services provided by callbacks/factory classes.
        'factories'  => [
            Application::class                => Container\ApplicationFactory::class,
            Delegate\NotFoundDelegate::class  => Container\NotFoundDelegateFactory::class,
            Helper\ServerUrlMiddleware::class => Helper\ServerUrlMiddlewareFactory::class,
            Helper\UrlHelper::class           => Helper\UrlHelperFactory::class,
            Helper\UrlHelperMiddleware::class => Helper\UrlHelperMiddlewareFactory::class,

            ErrorHandler::class => Container\ErrorHandlerFactory::class,
            Middleware\ErrorResponseGenerator::class         => Container\ErrorResponseGeneratorFactory::class,
            Middleware\NotFoundHandler::class                => Container\NotFoundHandlerFactory::class,
            'doctrine:fixtures_cmd:load' => FixtureFactory::class,
            CustomerRepositoryInterface::class => CustomerRepositoryFactory::class,
            TagRepositoryInterface::class => TagRepositoryFactory::class,
            CampaignRepositoryInterface::class => CampaignRepositoryFactory::class,
            FlashMessageInterface::class => FlashMessageFactory::class,
            BootstrapMiddleware::class => BootstrapMiddlewareFactory::class,
            AuthenticationMiddleware::class => AuthenticationMiddlewareFactory::class,
            TwigMiddleware::class => TwigMiddlewareFactory::class,
            AuthInterface::class => AuthServiceFactory::class,
            Mailgun\Mailgun::class => MailgunFactory::class,
            CampaignEmailServiceInterface::class => CampaignEmailSenderFactory::class,
            CampaignReportInterface::class => CampaignReportFactory::class
        ],
    ],
];
