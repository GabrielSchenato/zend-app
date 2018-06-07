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
        
        foreach (range(1, 20) as $key => $value) {
            $tag = new Tag();
            $tag->setName($faker->city);
            $this->addCustomers($tag);
            $this->addCampaigns($tag);
            $manager->persist($tag);
        }

        $manager->flush();
    }
    
    public function addCustomers(Tag $tag){
        $indexesCustomers = array_rand(range(0, 4), rand(2, 5));
        foreach ($indexesCustomers as $value){
            $customer = $this->getReference("customer-$value");            
            $tag->getCustomers()->add($customer);
        }
    }
    
    public function addCampaigns(Tag $tag){
        $indexesCampaigns = array_rand(range(0, 19), rand (2, 5));
        foreach ($indexesCampaigns as $value){
            $campaign = $this->getReference("campaign-$value");
            $tag->getCampaigns()->add($campaign);
        }
    }

    public function getOrder()
    {
        return 200;
    }

}
