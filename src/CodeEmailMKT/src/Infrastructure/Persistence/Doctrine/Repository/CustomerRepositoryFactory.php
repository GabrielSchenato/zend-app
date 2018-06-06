<?php

namespace CodeEmailMKT\Infrastructure\Persistence\Doctrine\Repository;

use CodeEmailMKT\Domain\Entity\Customer;
use Doctrine\ORM\EntityManager;
use Psr\Container\ContainerInterface;

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
class CustomerRepositoryFactory {

    public function __invoke(ContainerInterface $container): CustomerRepository
    {
        /** @var EntityManager $entityManager */
        $entityManager = $container->get(EntityManager::class);
        return $entityManager->getRepository(Customer::class);
    }

}
