<?php

declare (strict_types = 1);
namespace CodeEmailMKT\Domain\Entity;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Customer
 *
 * @author gabriel
 */
class Customer {

    private $id;
    private $name;
    private $email;

    function getId()
    {
        return $this->id;
    }

    function getName()
    {
        return $this->name;
    }

    function getEmail()
    {
        return $this->email;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setName(string $name)
    {
        $this->name = $name;
    }

    function setEmail(string $email)
    {
        $this->email = $email;
    }

}
