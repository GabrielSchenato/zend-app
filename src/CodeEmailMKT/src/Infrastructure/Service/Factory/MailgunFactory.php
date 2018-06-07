<?php

namespace CodeEmailMKT\Infrastructure\Service\Factory;

use Interop\Container\ContainerInterface;
use Mailgun\Mailgun;

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
class MailgunFactory {

    public function __invoke(ContainerInterface $container): Mailgun
    {
        $key = $container->get('config')['mailgun']['key'];
        return new Mailgun($key);
    }

}
