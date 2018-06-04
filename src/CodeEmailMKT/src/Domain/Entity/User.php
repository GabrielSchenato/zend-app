<?php

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
class User {

    private $id;
    private $name;
    private $email;
    private $password;

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

    function setName($name)
    {
        $this->name = $name;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }

    function getPassword()
    {
        return $this->password;
    }

    function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

}
