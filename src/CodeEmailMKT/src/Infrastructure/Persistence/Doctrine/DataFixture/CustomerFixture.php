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
        //$faker = Faker\Factory::create();

        foreach ($this->getData() as $key => $value) {
            $customer = new Customer();
            $customer->setName($value['name']);
            $customer->setEmail($value['email']);

            $manager->persist($customer);
            $this->addReference("customer-$key", $customer);
        }

        $manager->flush();
    }
    
    public function getData(){
        return [
            ['name' => 'Gabriel 1', 'email' => 'gabriel.schenato@inovadora.com.br'],
            ['name' => 'Gabriel 2', 'email' => 'gabriel@uniplaclages.edu.br'],
            ['name' => 'Gabriel 3', 'email' => 'gabriel.schenato@inovadora.com.br'],
            ['name' => 'Gabriel 4', 'email' => 'gabriel@uniplaclages.edu.br'],
            ['name' => 'Gabriel 5', 'email' => 'gabriel.schenato@inovadora.com.br']
        ];
    }

    public function getOrder()
    {
        return 100;
    }

}
