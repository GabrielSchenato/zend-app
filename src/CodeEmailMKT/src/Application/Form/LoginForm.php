<?php

namespace CodeEmailMKT\Application\Form;

use Zend\Form\Element\Button;
use Zend\Form\Element\Password;
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
class LoginForm extends Form
{
    public function __construct($name = 'login', $options = array())
    {
        parent::__construct($name, $options);

        $this->add([
           'name' => 'email',
            'type' => Text::class,
            'options' => [
                'label' => 'E-mail'
            ],
            'attributes' => [
                'id' => 'email',
                'type' => 'email'
            ]
        ]);
        
        $this->add([
           'name' => 'password',
            'type' => Password::class,
            'options' => [
                'label' => 'Senha'
            ],
            'attributes' => [
                'id' => 'password'
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
