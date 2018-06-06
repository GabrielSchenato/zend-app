<?php

namespace CodeEmailMKT\Infrastructure\Persistence\Doctrine\Repository;

use CodeEmailMKT\Domain\Entity\Tag;
use Doctrine\ORM\EntityManager;
use Psr\Container\ContainerInterface;

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
class TagRepositoryFactory {

    public function __invoke(ContainerInterface $container): TagRepository
    {
        /** @var EntityManager $entityManager */
        $entityManager = $container->get(EntityManager::class);
        return $entityManager->getRepository(Tag::class);
    }

}
