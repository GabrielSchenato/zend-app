<?php

declare (strict_types = 1);

namespace CodeEmailMKT\Infrastructure\Service;

use CodeEmailMKT\Domain\Entity\Campaign;
use CodeEmailMKT\Domain\Persistence\CustomerRepositoryInterface;
use CodeEmailMKT\Domain\Service\CampaignEmailServiceInterface;
use Mailgun\Mailgun;
use Mailgun\Messages\BatchMessage;
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
class CampaignEmailSender implements CampaignEmailServiceInterface {

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

    public function send()
    {
        //$this->createCampaign();
        $batchMessage = $this->getBatchMessage();

        $tags = $this->campaign->getTags()->toArray();
        foreach ($tags as $tag) {
            $batchMessage->addTag($tag->getName());
        }

        $customers = $this->repository->findByTags($tags);
        foreach ($customers as $customer) {
            $name = (!$customer->getName() or $customer->getName() == '') ? $customer->getEmail() : $customer->getName();
            $batchMessage->addToRecipient($customer->getEmail(), ['full_name' => $name]);
        }

        $batchMessage->finalize();
    }

    protected function getBatchMessage(): BatchMessage
    {
        $batchMessage = $this->mailGun->BatchMessage($this->mailGunConfig['domain']);
        $batchMessage->addCampaignId("campaign_{$this->campaign->getId()}");
        $batchMessage->setFromAddress("gabriel@uniplaclages.edu.br", ['full_name' => 'Schenato | MKT']);
        $batchMessage->setSubject($this->campaign->getSubject());
        $batchMessage->setHtmlBody($this->getHtmlBody());
        return $batchMessage;
    }

    protected function getHtmlBody(): string
    {
        $template = $this->campaign->getTemplate();
        return $this->templateRenderer->render('app::campaign/_campaign_template', [
            'content' => $template
        ]);
    }

    public function setCampaign(Campaign $campaign): CampaignEmailSender
    {
        $this->campaign = $campaign;
        return $this;
    }
    
    public function render() : ResponseInterface
    {
        return new HtmlResponse($this->templateRenderer->render('app::campaign/report', [
            'campaign_data' => $this->getCampaignData(),
            'campaign' => $this->campaign,
            'customers_count' => $this->getCountCustomers(),
            'opened_distinct_count' => $this->getCountOpenedDistinct()
        ]));
    }
    protected function getCampaignData()
    {
        $domain = $this->mailGunConfig['domain'];
        $response = $this->mailgun->get("$domain/campaigns/campaign_{$this->campaign->getId()}");
        return $response->http_response_body;
    }
    public function getCountOpenedDistinct()
    {
        $domain = $this->mailGunConfig['domain'];
        $response = $this->mailgun->get("$domain/campaigns/campaign_{$this->campaign->getId()}/opens", [
            'groupby' => 'recipient',
            'count' => true
        ]);
        return $response->http_response_body->count;
    }
    protected function getCountCustomers()
    {
        $tags = $this->campaign->getTags()->toArray();
        $customers = $this->repository->findByTags($tags);
        return count($customers);
    }

}
