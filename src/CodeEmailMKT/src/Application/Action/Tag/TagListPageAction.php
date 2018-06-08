<?php

namespace CodeEmailMKT\Application\Action\Tag;

use CodeEmailMKT\Domain\Persistence\Criteria\FindByIdCriteriaInterface;
use CodeEmailMKT\Domain\Persistence\Criteria\FindByNameCriteriaInterface;
use CodeEmailMKT\Domain\Persistence\TagRepositoryInterface;
use CodeEmailMKT\Domain\Service\FlashMessageInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template;

class TagListPageAction {

    /**
     * @var FindByIdCriteriaInterface
     */
    private $findByIdCriteria;

    /**
     * @var FindByNameCriteriaInterface
     */
    private $findByNameCriteria;
    private $template;
    private $repository;

    public function __construct(TagRepositoryInterface $repository, Template\TemplateRendererInterface $template, FindByNameCriteriaInterface $findByNameCriteria, FindByIdCriteriaInterface $findByIdCriteria)
    {
        $this->template = $template;
        $this->repository = $repository;
        $this->findByNameCriteria = $findByNameCriteria;
        $this->findByIdCriteria = $findByIdCriteria;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $tags = $this->repository->findAll();
        
        //this->findByNameCriteria->setName("Port Nicola");
        //$this->repository->add($this->findByNameCriteria);
        
//        $this->findByIdCriteria->setId(532);
//        $this->repository->add($this->findByIdCriteria);
//        
//        $tags = $this->repository->findWithCriteria();
        
        $flash = $request->getAttribute('flash')->getMessage(FlashMessageInterface::MESSAGE_SUCCESS);
        return new HtmlResponse($this->template->render("app::tag/list", [
                    'tags' => $tags,
                    'message' => $flash
        ]));
    }

}
