<?php

namespace App\DataFixtures;

use App\Entity\Techno;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TechnoFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $techno1 = new Techno();
        $techno1->setName("WordPress");
        $techno1->addProject($this->getReference(ProjectFixtures::PROJECT1));
        $manager->persist($techno1);

        $techno2 = new Techno();
        $techno2->setName("HTML/CSS");
        $techno2->addProject($this->getReference(ProjectFixtures::PROJECT2));
        $manager->persist($techno2);

        $techno3 = new Techno();
        $techno3->setName("PHP");
        $techno3->addProject($this->getReference(ProjectFixtures::PROJECT2));
        $manager->persist($techno3);

        $techno4 = new Techno();
        $techno4->setName("Simple MVC");
        $techno4->addProject($this->getReference(ProjectFixtures::PROJECT3));
        $manager->persist($techno4);

        $techno5 = new Techno();
        $techno5->setName("PHP");
        $techno5->addProject($this->getReference(ProjectFixtures::PROJECT3));
        $manager->persist($techno5);

        $techno6 = new Techno();
        $techno6->setName("Bootstrap");
        $techno6->addProject($this->getReference(ProjectFixtures::PROJECT3));
        $manager->persist($techno6);

        $techno7 = new Techno();
        $techno7->setName("Symfony");
        $techno7->addProject($this->getReference(ProjectFixtures::PROJECT4));
        $manager->persist($techno7);

        $techno8 = new Techno();
        $techno8->setName("PHP");
        $techno8->addProject($this->getReference(ProjectFixtures::PROJECT4));
        $manager->persist($techno8);

        $techno9 = new Techno();
        $techno9->setName("Bootstrap");
        $techno9->addProject($this->getReference(ProjectFixtures::PROJECT4));
        $manager->persist($techno9);

        $techno10 = new Techno();
        $techno10->setName("Javascript");
        $techno10->addProject($this->getReference(ProjectFixtures::PROJECT4));
        $manager->persist($techno10);

        $techno11 = new Techno();
        $techno11->setName("JQuery");
        $techno11->addProject($this->getReference(ProjectFixtures::PROJECT4));
        $manager->persist($techno11);

        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            ProjectFixtures::class,
        ];
    }
}
