<?php

namespace App\DataFixtures;

use App\Entity\Techno;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class TechnoFixtures extends Fixture
{
    public const TECHNO1 = 'techno1';
    public const TECHNO2 = 'techno2';
    public const TECHNO3 = 'techno3';
    public const TECHNO4 = 'techno4';
    public const TECHNO5 = 'techno5';
    public const TECHNO6 = 'techno6';
    public const TECHNO7 = 'techno7';
    public const TECHNO8 = 'techno8';
    public const TECHNO9 = 'techno9';
    public const TECHNO10 = 'techno10';
    public const TECHNO11 = 'techno11';


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

        $this->addReference(self::TECHNO1, $techno1);
        $this->addReference(self::TECHNO2, $techno2);
        $this->addReference(self::TECHNO3, $techno3);
        $this->addReference(self::TECHNO4, $techno4);
        $this->addReference(self::TECHNO5, $techno5);
        $this->addReference(self::TECHNO6, $techno6);
        $this->addReference(self::TECHNO7, $techno7);
        $this->addReference(self::TECHNO8, $techno8);
        $this->addReference(self::TECHNO9, $techno9);
        $this->addReference(self::TECHNO10, $techno10);
        $this->addReference(self::TECHNO11, $techno11);

        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            ProjectFixtures::class,
        ];
    }
}
