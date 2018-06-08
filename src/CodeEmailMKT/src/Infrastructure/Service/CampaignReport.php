<?php

declare (strict_types = 1);

namespace CodeEmailMKT\Infrastructure\Service;

use CodeEmailMKT\Domain\Entity\Campaign;
use CodeEmailMKT\Domain\Persistence\CustomerRepositoryInterface;
use CodeEmailMKT\Domain\Service\CampaignReportInterface;
use Mailgun\Mailgun;
use Psr\Http\Message\ResponseInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FlashMessage
 *
 * @author gabriel
 */
class CampaignReport implements CampaignReportInterface {

    /**
     * @var CustomerRepositoryInterface
     */
    private $repository;

    /**
     * @var array
     */
    private $mailGunConfig;

    /**
     * @var Campaign
     */
    private $campaign;

    /**
     * @var array
     */
    private $mailGun;

    /**
     * @var TemplateRendererInterface
     */
    private $templateRenderer;

    public function __construct(TemplateRendererInterface $templateRenderer, Mailgun $mailGun, array $mailGunConfig, CustomerRepositoryInterface $repository)
    {

        $this->templateRenderer = $templateRenderer;
        $this->mailGun = $mailGun;
        $this->mailGunConfig = $mailGunConfig;
        $this->repository = $repository;
    }


    public function setCampaign(Campaign $campaign): CampaignReport
    {
        $this->campaign = $campaign;
        return $this;
    }

    public function render(): ResponseInterface
    {
        $this->getCampaignData();
    }
    
    protected function getCampaignData(){
        $domain = $this->mailGunConfig['domain'];
        var_dump($this->mailGun->get("$domain/campaigns/campaign_{$this->campaign->getId()}"));
    }

}
