<?php

namespace CodeEmailMKT\Infrastructure\Persistence\Doctrine\Repository;

use CodeEmailMKT\Domain\Entity\Tag;
use CodeEmailMKT\Domain\Persistence\TagRepositoryInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\UnitOfWork;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TagRepository
 *
 * @author gabriel
 */
class TagRepository extends EntityRepository implements TagRepositoryInterface {

    public function create($entity): Tag
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
        return $entity;
    }

    public function remove($entity)
    {
        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush();
    }

    public function update($entity): Tag
    {
        if ($this->getEntityManager()->getUnitOfWork()->getEntityState($entity) != UnitOfWork::STATE_MANAGED) {
            $this->getEntityManager()->merge($entity);
        }

        $this->getEntityManager()->flush();
        return $entity;
    }
}
