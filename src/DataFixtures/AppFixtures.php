<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $admin = new Admin();
        $password = password_hash($_ENV['ADMIN_PASS'], PASSWORD_BCRYPT);

        $admin->setEmail($_ENV['ADMIN_USER'])->setPassword($password);

        $manager->persist($admin);
        $manager->flush();
    }
}
