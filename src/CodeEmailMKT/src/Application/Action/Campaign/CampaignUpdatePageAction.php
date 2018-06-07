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

class CampaignUpdatePageAction {

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
        $this->form->add(new HttpMethodElement('PUT'));
        $this->form->bind($entity);
        if ($request->getMethod() == "PUT") {
            $flash = $request->getAttribute('flash');
            $dataRaw = $request->getParsedBody();
            $this->form->setData($dataRaw);
            if ($this->form->isValid()) {
                $entity = $this->form->getData();
                $this->repository->update($entity);
                $flash->setMessage(FlashMessageInterface::MESSAGE_SUCCESS, 'Campanha editada com sucesso');
                $uri = $this->router->generateUri('list.campaigns');
                return new RedirectResponse($uri);
            }
        }
        return new HtmlResponse($this->template->render("app::campaign/update",[
            'form' => $this->form
        ]));
    }

}
