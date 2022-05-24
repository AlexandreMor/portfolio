<?php

namespace App\DataFixtures;

use App\Entity\Gallery;
use App\Entity\Project;
use App\Service\Slugify;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ProjectFixtures extends Fixture
{
    public const PROJECT1 = 'project1';
    public const PROJECT2 = 'project2';
    public const PROJECT3 = 'project3';
    public const PROJECT4 = 'project4';

    public function load(ObjectManager $manager): void
    {
        $slugify = new Slugify;

        $project1 = new Project();

        $project1->setName("CGT Hutchinson");
        $project1->setDescription("Réalisation du site web du syndicat CGT de l'usine Hutchinson à Châlette-sur-Loing, en équipe composée de 3 personnes avec le CMS Wordpress.");
        $slug1 = $slugify->generate($project1->getName());
        $project1->setSlug($slug1);
        $project1->addTechno($this->getReference(TechnoFixtures::TECHNO1));
        $project1->addImage($this->getReference(GalleryFixtures::GALLERY1));
        $project1->addImage($this->getReference(GalleryFixtures::GALLERY2));
        $manager->persist($project1);

        $project2 = new Project();
        $project2->setName("Projet 1 Wild Globe Trotters");
        $project2->setDescription("1er Projet à la Wild Code School destiné à introduire les bases du métier de développeur web. Il s'agit d'un blog de voyages qui recueille les expériences et les souvenirs de plusieurs personnes, des lieux et des recettes de cuisine y sont notamment évoquées.");
        $slug2 = $slugify->generate($project2->getName());
        $project2->setSlug($slug2);
        $project2->addTechno($this->getReference(TechnoFixtures::TECHNO2));
        $project2->addTechno($this->getReference(TechnoFixtures::TECHNO3));
        $project2->addImage($this->getReference(GalleryFixtures::GALLERY3));
        $project2->addImage($this->getReference(GalleryFixtures::GALLERY4));
        $manager->persist($project2);

        $project3 = new Project();
        $project3->setName("Projet 2 Dreamception");
        $project3->setDescription("2è projet réalisé à la Wild Code School avec Simple MVC (Model Vue Controller), framework de l'école prodiguant les bases de l'architecture MVC en PHP. Il s'agit d'un site e-commerce s'articulant autour du thème de la réalité augmentée, le client peut commander des casques de réalité virtuelle, des films ainsi que des accessoires.");
        $slug3 = $slugify->generate($project3->getName());
        $project3->setSlug($slug3);
        $project3->addTechno($this->getReference(TechnoFixtures::TECHNO4));
        $project3->addTechno($this->getReference(TechnoFixtures::TECHNO5));
        $project3->addTechno($this->getReference(TechnoFixtures::TECHNO6));
        $project3->addImage($this->getReference(GalleryFixtures::GALLERY5));
        $project3->addImage($this->getReference(GalleryFixtures::GALLERY6));
        $manager->persist($project3);

        $project4 = new Project();
        $project4->setName("Projet 3 Le juriste moderne");
        $project4->setDescription("Dernier projet à la Wild Code School, toujours réalisé en équipe en méthode agile. Il s'agit d'un site permettant à un dirigeant d'une entreprise de gérer sa structure, à l'aide d'une liste de contacts de personnes morales et physiques dans le but de coopérer sur un projet, gérer des réunions et l'envoi de documents. Il est destiné à un client, c'est la raison pour laquelle il n'est pas disponible sur Github.");
        $slug4 = $slugify->generate($project4->getName());
        $project4->setSlug($slug4);
        $project4->addTechno($this->getReference(TechnoFixtures::TECHNO7));
        $project4->addTechno($this->getReference(TechnoFixtures::TECHNO8));
        $project4->addTechno($this->getReference(TechnoFixtures::TECHNO9));
        $project4->addTechno($this->getReference(TechnoFixtures::TECHNO10));
        $project4->addTechno($this->getReference(TechnoFixtures::TECHNO11));
        $project4->addImage($this->getReference(GalleryFixtures::GALLERY7));
        $project4->addImage($this->getReference(GalleryFixtures::GALLERY8));
        $manager->persist($project4);
        $manager->flush();

        $this->addReference(self::PROJECT1, $project1);
        $this->addReference(self::PROJECT2, $project2);
        $this->addReference(self::PROJECT3, $project3);
        $this->addReference(self::PROJECT4, $project4);
    }

    public function getDependencies()
    {
        return [
            TechnoFixtures::class,
            GalleryFixtures::class,
        ];
    }
}
