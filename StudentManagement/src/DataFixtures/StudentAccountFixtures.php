<?php

namespace App\DataFixtures;

use App\Entity\Student;
use App\Entity\StudentAccount;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class StudentAccountFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $studentAccount = new StudentAccount();
            $studentAccount->setUsername("studentaccount$i");
            $studentAccount->setPassword("passaccount$i");
            $studentAccount->setRegisterDate(\DateTime::createFromFormat("Y-m-d", "2020-03-11"));
            $manager->persist($studentAccount);
        }

        $manager->flush();
    }
}
