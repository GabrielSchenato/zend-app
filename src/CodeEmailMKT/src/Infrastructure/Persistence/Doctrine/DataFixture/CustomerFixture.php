<?php

namespace CodeEmailMKT\Infrastructure\Persistence\Doctrine\DataFixture;

use CodeEmailMKT\Domain\Entity\Customer;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CustomerFixture
 *
 * @author gabriel
 */
class CustomerFixture implements FixtureInterface {

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

        foreach (range(1, 100) as $value) {
            $customer = new Customer();
            $customer->setName($faker->firstName . ' ' . $faker->lastName);
            $customer->setEmail($faker->email);

            $manager->persist($customer);
        }

        $manager->flush();
    }

}
