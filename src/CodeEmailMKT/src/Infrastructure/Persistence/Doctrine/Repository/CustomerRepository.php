<?php

namespace CodeEmailMKT\Infrastructure\Persistence\Doctrine\Repository;

use CodeEmailMKT\Domain\Persistence\CustomerRepositoryInterface;
use Doctrine\ORM\EntityRepository;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CustomerRepository
 *
 * @author gabriel
 */
class CustomerRepository extends EntityRepository implements CustomerRepositoryInterface {

    public function create($entity)
    {
        
    }

    public function remove($entity)
    {
        
    }

    public function update($entity)
    {
        
    }

    public function find($id)
    {
        
    }

    public function findAll()
    {
        
    }

}
