<?php

namespace CodeEmailMKT\Application\Middleware;

use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\View\HelperPluginManager;

class TwigMiddlewareFactory {

    public function __invoke(ContainerInterface $container)
    {
        /** #@var TwigRenderer $TwigRenderer */
        $twigRenderer = $container->get(TemplateRendererInterface::class);
        $twgEnv = $twigRenderer->getTemplate();
        $helperManager = $container->get(HelperPluginManager::class);
        return new TwigMiddleware($twgEnv, $helperManager);
    }

}
