<?php

namespace CodeEmailMKT\Infrastructure\Service\Factory;

use Aura\Session\Session;
use CodeEmailMKT\Infrastructure\Service\FlashMessage;
use Interop\Container\ContainerInterface;
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
class FlashMessageFactory
{
    
    public function __invoke(ContainerInterface $container)
    {
        $session = $container->get(Session::class);
        return new FlashMessage($session);
    }

}
