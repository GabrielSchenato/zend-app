<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CodeEmailMKT\Infrastructure\Persistence\Doctrine\Repository;

use CodeEmailMKT\Domain\Persistence\CriteriaInterface;

/**
 * Description of RepositoryCriteriaTrait
 *
 * @author gabriel
 */
trait RepositoryCriteriaTrait {

    protected $criterias = [];
    protected $ALIAS_ENTITY;

    public function add(CriteriaInterface $criteria)
    {
        $this->criterias[] = $criteria;
    }

    public function findWithCriteria()
    {
        $this->queryBuilder = $this->createQueryBuilder($this->ALIAS_ENTITY);
        foreach ($this->criterias as $criteria){
            $criteria->apply($this);
        }
        return $this->queryBuilder->getQuery()->getResult();
    }

    public function set(array $criterias)
    {
        $this->criterias = $criterias;
    }

}
