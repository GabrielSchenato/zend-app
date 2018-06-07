<?php

namespace CodeEmailMKT\Application\Action\Campaign;

use CodeEmailMKT\Application\Form\CampaignForm;
use CodeEmailMKT\Application\Form\HttpMethodElement;
use CodeEmailMKT\Domain\Persistence\CampaignRepositoryInterface;
use CodeEmailMKT\Domain\Service\FlashMessageInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template;

class CampaignDeletePageAction {

    /**
     * @var CampaignForm
     */
    private $form;

    /**
     * @var RouterInterface
     */
    private $router;
    private $template;
    private $repository;

    public function __construct(CampaignRepositoryInterface $repository, Template\TemplateRendererInterface $template, RouterInterface $router, CampaignForm $form)
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
            $flash->setMessage(FlashMessageInterface::MESSAGE_SUCCESS, 'Campanha removida com sucesso');
            
            $uri = $this->router->generateUri('list.campaigns');
                        
            return new RedirectResponse($uri);
        }
        
        return new HtmlResponse($this->template->render("app::campaign/delete",[
            'form' => $this->form
        ]));
    }

}
