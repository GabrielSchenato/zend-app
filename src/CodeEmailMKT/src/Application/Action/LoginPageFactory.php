<?php

namespace CodeEmailMKT\Application\Action;

use CodeEmailMKT\Application\Action\LoginPageAction;
use CodeEmailMKT\Application\Form\LoginForm;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class LoginPageFactory {
    
    public function __invoke(ContainerInterface $container)
    {
        $router = $container->get(RouterInterface::class);
        $template = $container->get(TemplateRendererInterface::class);
        $form = $container->get(LoginForm::class);
        return new LoginPageAction($router, $template, $form);
    }

}
