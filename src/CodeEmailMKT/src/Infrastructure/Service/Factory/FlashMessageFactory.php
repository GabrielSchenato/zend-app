<?php

namespace CodeEmailMKT\Infrastructure\Service\Factory;

use CodeEmailMKT\Infrastructure\Service\FlashMessage;
use Interop\Container\ContainerInterface;
use Zend\Mvc\Plugin\FlashMessenger\FlashMessenger;
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
        $flashMessenger = new FlashMessenger();
        return new FlashMessage($flashMessenger);
    }

}
