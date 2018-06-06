<?php

namespace CodeEmailMKT\Infrastructure\Persistence\Doctrine\DataFixture;

use CodeEmailMKT\Domain\Entity\Tag;
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
class TagFixture extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface {

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();
        
        foreach (range(1, 100) as $key => $value) {
            $tag = new Tag();
            $tag->setName($faker->city);
            $this->addCustomers($tag);
            $manager->persist($tag);
        }

        $manager->flush();
    }
    
    public function addCustomers(Tag $tag){
        $numCustomers = rand(1, 5);
        foreach (range(1, $numCustomers) as $value){
            $index = rand(0,99);
            $customer = $this->getReference("customer-$index");
            if($tag->getCustomers()->exists(function($key, $item) use($customer){
                return $customer->getId() == $item->getId();
            })){
                $index = rand(0,99);
                $customer = $this->getReference("customer-$index");
            }
            $tag->getCustomers()->add($customer);
        }
    }

    public function getOrder()
    {
        return 200;
    }

}
