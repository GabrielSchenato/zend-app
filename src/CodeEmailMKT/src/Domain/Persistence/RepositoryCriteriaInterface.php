<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CodeEmailMKT\Domain\Persistence;

/**
 *
 * @author gabriel
 */
interface RepositoryCriteriaInterface {
    public function add(CriteriaInterface $criteria);
    public function set(array $criterias);
    public function findWithCriteria();
    
    public function setQueryBuilder($queryBuilder);
    public function getQueryBuilder();
}
