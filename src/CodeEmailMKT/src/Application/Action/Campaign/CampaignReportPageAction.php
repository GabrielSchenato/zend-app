<?php

namespace CodeEmailMKT\Application\Action\Campaign;

use CodeEmailMKT\Domain\Persistence\CampaignRepositoryInterface;
use CodeEmailMKT\Domain\Service\CampaignReportInterface;
use CodeEmailMKT\Domain\Service\FlashMessageInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;


class CampaignReportPageAction {

    /**
     * @var CampaignReportInterface
     */
    private $report;
    private $repository;

    public function __construct(CampaignRepositoryInterface $repository, CampaignReportInterface $report)
    {
        $this->repository = $repository;
        $this->report = $report;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $id = $request->getAttribute('id');
        $entity = $this->repository->find($id);
        $this->report->setCampaign($entity);
        return $this->report->render();
    }

}
