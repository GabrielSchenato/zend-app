<?php

namespace CodeEmailMKT\Application\Action;

use CodeEmailMKT\Domain\Service\AuthInterface;
use CodeEmailMKT\Infrastructure\Service\AuthService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Router\RouterInterface;

class LogoutAction {

    /**
     * @var AuthService
     */
    private $authService;

    /**
     * @var RouterInterface
     */
    private $router;

    public function __construct(RouterInterface $router, AuthInterface $authService)
    {
        $this->router = $router;
        $this->authService = $authService;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $this->authService->destroy();
        $uri = $this->router->generateUri('auth.login');
        return new RedirectResponse($uri);       
    }

}
