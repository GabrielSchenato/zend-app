<?php

namespace CodeEmailMKT\Application\Action\Customer;

use CodeEmailMKT\Application\Form\CustomerForm;
use CodeEmailMKT\Domain\Entity\Customer;
use CodeEmailMKT\Domain\Persistence\CustomerRepositoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template;

class CustomerCreatePageAction {

    /**
     * @var RouterInterface
     */
    private $router;
    private $template;
    private $repository;

    public function __construct(CustomerRepositoryInterface $repository, Template\TemplateRendererInterface $template, RouterInterface $router)
    {
        $this->template = $template;
        $this->repository = $repository;
        $this->router = $router;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $form = new CustomerForm();
        if($request->getMethod() == "POST"){
            $dataRaw = $request->getParsedBody();
            $form->setData($dataRaw);
            if ($form->isValid()) {
                $data = $form->getData();
                $entity = new Customer();
                $entity->setName($data['name']);
                $entity->setEmail($data['email']);
                $this->repository->create($entity);
                $flash = $request->getAttribute('flash');
                $flash->setMessage('success', 'Contato cadastrado com sucesso');

                $uri = $this->router->generateUri('list.customers');

                return new RedirectResponse($uri);
            }
        }
        
        return new HtmlResponse($this->template->render("app::customer/create", [
            'form' => $form
        ]));
    }

}
