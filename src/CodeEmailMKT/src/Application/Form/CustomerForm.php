<?php

namespace CodeEmailMKT\Application\Form;

use Zend\Form\Element\Button;
use Zend\Form\Element\Email;
use Zend\Form\Element\Hidden;
use Zend\Form\Element\Text;
use Zend\Form\Form;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CustomerForm
 *
 * @author gabriel
 */
class CustomerForm extends Form
{
    public function __construct($name = 'customer', $options = array())
    {
        parent::__construct($name, $options);
        
        $this->add([
           'name' => 'id',
            'type' => Hidden::class
        ]);
        
        $this->add([
           'name' => 'name',
            'type' => Text::class,
            'options' => [
                'label' => 'Nome'
            ],
            'attributes' => [
                'id' => 'name'
            ]
        ]);
        
        $this->add([
           'name' => 'email',
            'type' => Email::class,
            'options' => [
                'label' => 'E-mail'
            ],
            'attributes' => [
                'id' => 'email'
            ]
        ]);
        
        $this->add([
           'name' => 'submit',
            'type' => Button::class,
            'attributes' => [
                'type' => 'submit'
            ]
        ]);
        
    }
}
