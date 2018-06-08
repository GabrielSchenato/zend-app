<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CodeEmailMKT\Infrastructure\Persistence\Doctrine\Repository;

use Doctrine\ORM\QueryBuilder;

/**
 * Description of QueryBuilderTrait
 *
 * @author gabriel
 */
trait QueryBuilderTrait {
    protected $queryBuilder;
    
    public function getQueryBuilder(): QueryBuilder
    {
        return $this->queryBuilder;
    }
    
    public function setQueryBuilder(QueryBuilder $queryBuilder)
    {
        $this->queryBuilder = $queryBuilder;
    }
}
