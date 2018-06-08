<?php

declare (strict_types = 1);

namespace CodeEmailMKT\Infrastructure\Persistence\Doctrine\Repository\Criteria;

use CodeEmailMKT\Domain\Persistence\Criteria\FindByIdCriteriaInterface;
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
class FindByIdCriteria implements FindByIdCriteriaInterface{

    private $id; 
    
    public function apply(RepositoryCriteriaInterface $repository)
    {
        $alias = $repository->ALIAS_ENTITY;
        /** @var QueryBuilder $queryBuilder */
        $queryBuilder = $repository->getQueryBuilder();
        $queryBuilder->andWhere("$alias.id = :id")
                ->setParameter('id', $this->getId());
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

}
