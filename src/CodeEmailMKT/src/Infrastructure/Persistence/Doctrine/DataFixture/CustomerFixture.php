<?php

namespace CodeEmailMKT\Infrastructure\Persistence\Doctrine\DataFixture;

use CodeEmailMKT\Domain\Entity\Customer;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
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
class CustomerFixture extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface {

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

        foreach (range(1, 100) as $key => $value) {
            $customer = new Customer();
            $customer->setName($faker->firstName . ' ' . $faker->lastName);
            $customer->setEmail($faker->email);

            $manager->persist($customer);
            $this->addReference("customer-$key", $customer);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 100;
    }

}
