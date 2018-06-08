<?php

declare (strict_types = 1);

namespace CodeEmailMKT\Infrastructure\Persistence\Doctrine\Repository\Criteria;

use CodeEmailMKT\Domain\Persistence\Criteria\FindByNameCriteriaInterface;
use CodeEmailMKT\Domain\Persistence\RepositoryCriteriaInterface;
use Doctrine\ORM\QueryBuilder;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FindByNameCriteria
 *
 * @author gabriel
 */
class FindByNameCriteria implements FindByNameCriteriaInterface{

    private $name; 
    
    public function apply(RepositoryCriteriaInterface $repository)
    {
        $alias = $repository->ALIAS_ENTITY;
        /** @var QueryBuilder $queryBuilder */
        $queryBuilder = $repository->getQueryBuilder();
        $queryBuilder->andWhere("$alias.name = :name")
                ->setParameter('name', $this->getName());
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

}
