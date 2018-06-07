<?php

namespace CodeEmailMKT\Infrastructure\Service\Factory;

use CodeEmailMKT\Infrastructure\Service\CampaignEmailSender;
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

    public function __invoke(ContainerInterface $container): CampaignEmailSender
    {
        $template = $container->get(\Zend\Expressive\Template\TemplateRendererInterface::class);
        $mailGun = $container->get(\Mailgun\Mailgun::class);
        $mailGunConfig = $container->get('config')['mailgun'];
        return new CampaignEmailSender($template, $mailGun, $mailGunConfig);
    }

}
