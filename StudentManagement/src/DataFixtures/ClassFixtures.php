<?php

namespace App\DataFixtures;

use App\Entity\Classes;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ClassFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 5; $i++) {
            $class = new Classes();
            $class->setName("Class $i");
            $class->setSubject("Subject $i");
            $class->setTotalLesson(rand(40, 60));
            $class->setGrade(rand(4, 10));
            $class->setAbsent(rand(1, 25));
            $manager->persist($class);
        }

        $manager->flush();
    }
}
