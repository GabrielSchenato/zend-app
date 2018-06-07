<?php

namespace CodeEmailMKT\Infrastructure\Service\Factory;

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
class CampaignEmailSenderFactory {

    public function __invoke(ContainerInterface $container): CampaignEmailSenderFactory
    {
        return new CampaignEmailSender();
    }

}
