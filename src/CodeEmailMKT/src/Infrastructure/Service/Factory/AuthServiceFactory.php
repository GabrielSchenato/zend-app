<?php

namespace CodeEmailMKT\Infrastructure\Service\Factory;

use CodeEmailMKT\Infrastructure\Service\AuthService;
use Interop\Container\ContainerInterface;
use Zend\Authentication\AuthenticationService;

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
class AuthServiceFactory {

    public function __invoke(ContainerInterface $container): AuthService
    {
        $authenticationService = $container->get(AuthenticationService::class);
        return new AuthService($authenticationService);
    }

}
