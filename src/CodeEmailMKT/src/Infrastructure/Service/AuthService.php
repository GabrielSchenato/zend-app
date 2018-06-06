<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CodeEmailMKT\Infrastructure\Service;

use CodeEmailMKT\Domain\Entity\User;
use CodeEmailMKT\Domain\Service\AuthInterface;
use Zend\Authentication\AuthenticationService;

/**
 * Description of AuthService
 *
 * @author gabriel
 */
class AuthService implements AuthInterface{

    /**
     * @var AuthenticationService
     */
    private $authenticationService;

    public function __construct(AuthenticationService $authenticationService)
    {
        $this->authenticationService = $authenticationService;
    }
    public function authenticate(string $email, string $password): bool
    {
        $adapter = $this->authenticationService->getAdapter();
        $adapter->setIdentity($email);
        $adapter->setCredential($password);
        $result = $this->authenticationService->authenticate();
        return $result->isValid();
    }

    public function destroy()
    {
        $this->authenticationService->clearIdentity();
    }

    public function getUser(): User
    {
        return $this->authenticationService->getIdentity();
    }

    public function isAuth(): bool
    {
        return $this->getUser() != null;
    }

}
