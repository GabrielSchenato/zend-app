<?php

namespace CodeEmailMKT\Infrastructure\Persistence\Doctrine\DataFixture;

use CodeEmailMKT\Domain\Entity\Campaign;
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
class CampaignFixture extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface {

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();
        $template = "<p>Olá %recipient.full_name%,</p><p>{$faker->paragraph(2)}<a href='https://www.google.com'>Comprar Produto</a></p>";
        foreach (range(1, 20) as $key => $value) {
            $campaign = new Campaign();
            $campaign->setName($faker->country);
            $campaign->setSubject("%recipient.full_name%, ". $faker->sentence(3));
            $campaign->setTemplate($template);
            $manager->persist($campaign);
            $this->addReference("campaign-$key", $campaign);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 100;
    }

}
