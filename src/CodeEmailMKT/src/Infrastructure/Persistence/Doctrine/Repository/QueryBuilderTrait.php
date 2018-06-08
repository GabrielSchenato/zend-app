<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CodeEmailMKT\Infrastructure\Persistence\Doctrine\Repository;

/**
 * Description of QueryBuilderTrait
 *
 * @author gabriel
 */
trait QueryBuilderTrait {
    protected $queryBuilder;
    
    public function getQueryBuilder()
    {
        return $this->queryBuilder;
    }
    
    public function setQueryBuilder($queryBuilder)
    {
        $this->queryBuilder = $queryBuilder;
    }
}
