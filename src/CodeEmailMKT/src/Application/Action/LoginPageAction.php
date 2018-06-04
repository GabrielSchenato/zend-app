<?php

namespace CodeEmailMKT\Application\Action;

use CodeEmailMKT\Application\Form\LoginForm;
use CodeEmailMKT\Domain\Service\AuthInterface;
use CodeEmailMKT\Infrastructure\Service\AuthService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template;

class LoginPageAction {

    /**
     * @var AuthService
     */
    private $authService;

    /**
     * @var LoginForm
     */
    private $form;

    /**
     * @var RouterInterface
     */
    private $router;
    private $template;

    public function __construct(RouterInterface $router, Template\TemplateRendererInterface $template, LoginForm $form, AuthInterface $authService)
    {
        $this->template = $template;
        $this->router = $router;
        $this->form = $form;
        $this->authService = $authService;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $renderParams = [
            'form' => $this->form
        ];
        
        if ($request->getMethod() == 'POST') {
            $data = $request->getParsedBody();
            $this->form->setData($data);
            if ($this->form->isValid()) {
                $user = $this->form->getData();
                if ($this->authService->authenticate($user['email'], $user['password'])) {
                    $uri = $this->router->generateUri('list.customers');
                    return new RedirectResponse($uri);
                }
            }
            $renderParams['message'] = 'Login e/ou senha inválidos';
            $renderParams['messageType'] = 'error';
        }
        return new HtmlResponse($this->template->render("app::login", $renderParams));
    }

}
