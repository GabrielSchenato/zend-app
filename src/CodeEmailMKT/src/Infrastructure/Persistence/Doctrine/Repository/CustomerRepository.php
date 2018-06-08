<?php

namespace CodeEmailMKT\Infrastructure\Persistence\Doctrine\Repository;

use CodeEmailMKT\Domain\Persistence\CustomerRepositoryInterface;
use CodeEmailMKT\Infrastructure\Persistence\Doctrine\Repository\AbstractRepository;

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
class CustomerRepository extends AbstractRepository implements CustomerRepositoryInterface {

    public function findByTags(array $tags): array
    {
        $qb = $this->createQueryBuilder('c')
                ->distinct()
                ->leftJoin(Tag::class, 't')
                ->andWhere('t.id IN (:tag_ids)')
                ->setParameter('tag_ids', $tags);
        return $qb->getQuery()->getResult();
    }

}
