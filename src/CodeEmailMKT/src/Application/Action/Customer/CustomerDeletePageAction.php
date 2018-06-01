<?php

namespace CodeEmailMKT\Application\Action\Customer;

use CodeEmailMKT\Domain\Persistence\CustomerRepositoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template;

class CustomerDeletePageAction {

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
        $id = $request->getAttribute('id');
        $entity = $this->repository->find($id);
        
        if($request->getMethod() == "DELETE"){
            $data = $request->getParsedBody();
            $this->repository->remove($entity);
            $flash = $request->getAttribute('flash');
            $flash->setMessage('success', 'Contato removido com sucesso');
            
            $uri = $this->router->generateUri('list.customers');
                        
            return new RedirectResponse($uri);
        }
        
        return new HtmlResponse($this->template->render("app::customer/delete",[
            'customer' => $entity
        ]));
    }

}
