<?php

namespace CodeEmailMKT\Application\Action\Tag;

use CodeEmailMKT\Application\Form\TagForm;
use CodeEmailMKT\Application\Form\HttpMethodElement;
use CodeEmailMKT\Domain\Persistence\TagRepositoryInterface;
use CodeEmailMKT\Domain\Service\FlashMessageInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template;

class TagDeletePageAction {

    /**
     * @var TagForm
     */
    private $form;

    /**
     * @var RouterInterface
     */
    private $router;
    private $template;
    private $repository;

    public function __construct(TagRepositoryInterface $repository, Template\TemplateRendererInterface $template, RouterInterface $router, TagForm $form)
    {
        $this->template = $template;
        $this->repository = $repository;
        $this->router = $router;
        $this->form = $form;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $id = $request->getAttribute('id');
        $entity = $this->repository->find($id);
        $this->form->add(new HttpMethodElement('DELETE'));
        $this->form->bind($entity);
        
        if($request->getMethod() == "DELETE"){
            $this->repository->remove($entity);
            $flash = $request->getAttribute('flash');
            $flash->setMessage(FlashMessageInterface::MESSAGE_SUCCESS, 'Tag removida com sucesso');
            
            $uri = $this->router->generateUri('list.tags');
                        
            return new RedirectResponse($uri);
        }
        
        return new HtmlResponse($this->template->render("app::tag/delete",[
            'form' => $this->form
        ]));
    }

}
