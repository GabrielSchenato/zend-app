<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CodeEmailMKT\Application\Form;

use Zend\Form\Element\Hidden;

/**
 * Description of HttpMethodElement
 *
 * @author gabriel
 */
class HttpMethodElement extends Hidden{
    public function __construct($value, $options = array())
    {
        parent::__construct('_method', $options);
        $this->setValue($value);
    }
}
