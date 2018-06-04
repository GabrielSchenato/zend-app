<?php

namespace CodeEmailMKT\Application\Action;

use CodeEmailMKT\Application\Form\LoginForm;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template;

class LoginPageAction {

    /**
     * @var LoginForm
     */
    private $form;

    /**
     * @var RouterInterface
     */
    private $router;
    private $template;

    public function __construct(RouterInterface $router, Template\TemplateRendererInterface $template, LoginForm $form)
    {
        $this->template = $template;
        $this->router = $router;
        $this->form = $form;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        return new HtmlResponse($this->template->render("app::login", [
            'form' => $this->form
        ]));
    }

}
