<?php

namespace App\DataFixtures;

use App\Entity\AboutMe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class AboutMeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $aboutMe = new AboutMe();
        $aboutMe->setGithubLink("https://github.com/Alexandre_Mor");
        $aboutMe->setLinkedinLink("https://linkedin.com/in/alexandre-morlat-03aa00220");
        $aboutMe->setDescription("Je m'appelle Alexandre Morlat, j'ai 36 ans et je recherche une alternance développeur web pour septembre 2022.
        Je vous présente ici mes différents projets effectués à la Wild Code School d'avril à juillet 2021, un projet Wordpress effectué lors d'un stage ainsi que d'autres projets personnels.");
        $manager->persist($aboutMe);
        $manager->flush();
    }
}
