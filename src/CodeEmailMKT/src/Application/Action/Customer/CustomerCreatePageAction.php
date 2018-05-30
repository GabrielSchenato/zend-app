<?php

namespace CodeEmailMKT\Application\Action\Customer;

use CodeEmailMKT\Domain\Entity\Customer;
use CodeEmailMKT\Domain\Persistence\CustomerRepositoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template;

class CustomerCreatePageAction {

    private $template;
    private $repository;

    public function __construct(CustomerRepositoryInterface $repository, Template\TemplateRendererInterface $template)
    {
        $this->template = $template;
        $this->repository = $repository;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        
        if($request->getMethod() == "POST"){
            $data = $request->getParsedBody();
            $entity = new Customer();
            $entity->setName($data['name']);
            $entity->setEmail($data['email']);
            $this->repository->create($entity);
        }
        
        return new HtmlResponse($this->template->render("app::customer/create"));
    }

}
