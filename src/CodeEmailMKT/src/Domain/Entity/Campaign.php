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
 * Description of Campaign
 *
 * @author gabriel
 */
class Campaign {

    private $id;
    private $name;
    private $subject;
    private $template;
    private $tags;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }

    function getId()
    {
        return $this->id;
    }

    function getName()
    {
        return $this->name;
    }

    function getTemplate()
    {
        return $this->template;
    }

    function getTags(): Collection
    {
        return $this->tags;
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

    function setTemplate(string $template)
    {
        $this->template = $template;
        return $this;
    }
    
    function getSubject()
    {
        return $this->subject;
    }

    function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    
    public function addTags(Collection $tags)
    {
        /** @var Tag $tag */
        foreach ($tags as $tag) {
            $tag->getCampaigns()->add($this);
            $this->tags->add($tag);
        }
        return $this;
    }

    public function removeTags(Collection $tags)
    {
        /** @var Tag $tag */
        foreach ($tags as $tag) {
            $tag->getCampaigns()->removeElement($this);
            $this->tags->removeElement($tag);
        }
        return $this;
    }

}
