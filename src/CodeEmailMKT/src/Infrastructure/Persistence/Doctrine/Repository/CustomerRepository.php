<?php

namespace CodeEmailMKT\Infrastructure\Persistence\Doctrine\Repository;

use CodeEmailMKT\Domain\Persistence\CustomerRepositoryInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\UnitOfWork;

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
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
        return $entity;
    }

    public function remove($entity)
    {
        
    }

    public function update($entity)
    {
        if($this->getEntityManager()->getUnitOfWork()->getEntityState($entity) != UnitOfWork::STATE_MANAGED){
            $this->getEntityManager()->merge($entity);
        }
        
        $this->getEntityManager()->flush();
        return $entity;
    }

    public function find($id)
    {
        return parent::find($id);
    }

    public function findAll()
    {
        return parent::findAll();
    }

}
