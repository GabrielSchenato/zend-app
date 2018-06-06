<?php

declare (strict_types = 1);

namespace CodeEmailMKT\Domain\Service;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CodeEmailMKT\Domain\Service;


/**
 *
 * @author gabriel
 */
interface AuthInterface {

    public function authenticate(string $email, string $password): bool;

    public function isAuth(): bool;

    public function getUser();

    public function destroy();
}
