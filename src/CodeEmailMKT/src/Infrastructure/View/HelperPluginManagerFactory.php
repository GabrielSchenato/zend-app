<?php

namespace CodeEmailMKT\Infrastructure\View;

use Interop\Container\ContainerInterface;
use Zend\View\HelperPluginManager;
use Zend\View\Renderer\PhpRenderer;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CustomerRepository
 *
 * @author gabriel
 */
class HelperPluginManagerFactory {

    public function __invoke(ContainerInterface $container): HelperPluginManager
    {
        $config = $container->get('config');
        $viewHelpers = $config['view_helpers'];
        $manager = new HelperPluginManager($container, $viewHelpers);
        $phpRenderer = new PhpRenderer();
        $phpRenderer->setHelperPluginManager($manager);

        return $manager;
    }

}
