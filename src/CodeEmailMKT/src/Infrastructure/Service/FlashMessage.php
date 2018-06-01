<?php

namespace CodeEmailMKT\Infrastructure\Service;

use Aura\Session\Segment;
use Aura\Session\Session;
use CodeEmailMKT\Domain\Service\FlashMessageInterface;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FlashMessage
 *
 * @author gabriel
 */
class FlashMessage implements FlashMessageInterface {

    /**
     * @var Session
     */
    private $session;

    /**
     * @var Segment
     */
    private $segment;

    public function __construct(Session $session)
    { 
        $this->session = $session;
        if (!$this->session->isStarted()) {
            $this->session->start();
        }
    }

    public function getMessage($key)
    {
        if (!$this->segment) {
            $this->setNamespace();
        }
        return $this->segment->getFlash($key);
    }

    public function setMessage($key, $value)
    {
        if (!$this->segment) {
            $this->setNamespace();
        }
        $this->segment->setFlash($key, $value);
        return $this;
    }

    public function setNamespace($name = __NAMESPACE__)
    {
        $this->segment = $this->session->getSegment($name);
        return $this;
    }

}
