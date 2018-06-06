<?php

declare (strict_types = 1);
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CodeEmailMKT\Domain\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Description of Tag
 *
 * @author gabriel
 */
class Tag {

    private $id;
    private $name;
    private $customers;

    public function __construct()
    {
        $this->customers = new ArrayCollection();
    }

    function getId()
    {
        return $this->id;
    }

    function getName()
    {
        return $this->name;
    }

    function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }
    function getCustomers(): Collection
    {
        return $this->customers;
    }


}
