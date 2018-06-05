<?php

namespace CodeEmailMKT\Infrastructure\Service;

use CodeEmailMKT\Domain\Service\FlashMessageInterface;
use Zend\Mvc\Plugin\FlashMessenger\FlashMessenger;

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
     * @var FlashMessenger
     */
    private $flashMessenger;

    public function __construct(FlashMessenger $flashMessenger)
    { 
        $this->flashMessenger = $flashMessenger;
    }

    public function getMessage($key)
    {
        $result = null;
        switch ($key){
            case self::MESSAGE_SUCCESS:
                $result = $this->flashMessenger->getCurrentSuccessMessages();
                break;
        }
        return count($result) ? $result[0] : null;
    }

    public function setMessage($key, $value)
    {
        switch ($key){
            case self::MESSAGE_SUCCESS:
                $this->flashMessenger->addSuccessMessage($value);
                break;
        }        
        return $this;
    }

    public function setNamespace($name = __NAMESPACE__)
    {
        $this->flashMessenger->setNamespace($name);
        return $this;
    }

}
