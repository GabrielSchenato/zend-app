<?php

namespace CodeEmailMKT\Infrastructure\Persistence\Doctrine\DataFixture;

use CodeEmailMKT\Domain\Entity\User;
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
class UserFixture implements FixtureInterface {

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

            $user = new User();
            $user->setName('Admin');
            $user->setEmail('admin@user.com');
            $user->setPlainPassword(123456);

            $manager->persist($user);
        
        foreach (range(1, 10) as $value) {
            $user = new User();
            $user->setName($faker->firstName . ' ' . $faker->lastName);
            $user->setEmail($faker->email);
            $user->setPlainPassword(123456);

            $manager->persist($user);
        }

        $manager->flush();
    }

}
