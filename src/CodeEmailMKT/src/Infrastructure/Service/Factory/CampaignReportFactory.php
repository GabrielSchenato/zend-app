<?php

namespace CodeEmailMKT\Infrastructure\Service\Factory;

use CodeEmailMKT\Domain\Persistence\CustomerRepositoryInterface;
use CodeEmailMKT\Infrastructure\Service\CampaignReport;
use Interop\Container\ContainerInterface;
use Mailgun\Mailgun;
use Zend\Expressive\Template\TemplateRendererInterface;

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
class CampaignReportFactory {

    public function __invoke(ContainerInterface $container): CampaignReport
    {
        $template = $container->get(TemplateRendererInterface::class);
        $mailGun = $container->get(Mailgun::class);
        $mailGunConfig = $container->get('config')['mailgun'];
        $repository = $container->get(CustomerRepositoryInterface::class);
        return new CampaignReport($template, $mailGun, $mailGunConfig, $repository);
    }

}
