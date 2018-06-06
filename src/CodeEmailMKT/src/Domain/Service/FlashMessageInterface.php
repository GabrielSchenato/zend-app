<?php

declare(strict_types = 1);
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
interface FlashMessageInterface {

    const MESSAGE_SUCCESS = 0;

    public function setNamespace(string $name);

    public function setMessage($key, string $value);

    public function getMessage($key);
}
