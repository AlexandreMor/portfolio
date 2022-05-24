<?php

namespace App\DataFixtures;

use App\Entity\Gallery;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class GalleryFixtures extends Fixture
{
    public const GALLERY1 = 'gallery1';
    public const GALLERY2 = 'gallery2';
    public const GALLERY3 = 'gallery3';
    public const GALLERY4 = 'gallery4';
    public const GALLERY5 = 'gallery5';
    public const GALLERY6 = 'gallery6';
    public const GALLERY7 = 'gallery7';
    public const GALLERY8 = 'gallery8';

    public function load(ObjectManager $manager): void
    {
        $gallery1 = new Gallery();
        $gallery2 = new Gallery();
        $gallery3 = new Gallery();
        $gallery4 = new Gallery();
        $gallery5 = new Gallery();
        $gallery6 = new Gallery();
        $gallery7 = new Gallery();
        $gallery8 = new Gallery();
        //CGT Hutchinson
        $src1 = __DIR__ . "/../../public/images/projects/Screenshot 2022-05-22 at 19-02-09 Publications de Tracts - CGT Hutchinson.png";
        $src2 = __DIR__ . "/../../public/images/projects/Screenshot 2022-05-22 at 19-01-50 CGT Hutchinson Châlette_Loing - Syndicat de classe et de masse.png";
        //Projet 1
        $src3 = __DIR__ . "/../../public/images/projects/screenprojet1.png";
        $src4 = __DIR__ . "/../../public/images/projects/screen2projet1.png";
        //Projet 2
        $src5 = __DIR__ . "/../../public/images/projects/Screenshot 2021-12-23 at 10-27-25 Dreamception.png";
        $src6 = __DIR__ . "/../../public/images/projects/Screenshot 2021-12-23 at 10-31-38 Dreamception - Admin.png";
        //Projet 3
        $src7 = __DIR__ . "/../../public/images/projects/Screenshot 2021-12-23 at 10-18-12 LJM - Home.png";
        $src8 = __DIR__ . "/../../public/images/projects/Screenshot 2021-12-23 at 10-22-24 LJM - ChausseTout.png";

        $file1 = new UploadedFile(
            $src1,
            'Screenshot 2022-05-22 at 19-02-09 Publications de Tracts - CGT Hutchinson.png',
            'image/png',
            null,
            true
        );

        $file2 = new UploadedFile(
            $src2,
            'Screenshot 2022-05-22 at 19-01-50 CGT Hutchinson Châlette_Loing - Syndicat de classe et de masse.png',
            'image/png',
            null,
            true
        );

        $file3 = new UploadedFile(
            $src3,
            'screenprojet1.png',
            'image/png',
            null,
            true
        );
        $file4 = new UploadedFile(
            $src4,
            'screen2projet1.png',
            'image/png',
            null,
            true
        );
        $file5 = new UploadedFile(
            $src5,
            'Screenshot 2021-12-23 at 10-27-25 Dreamception.png',
            'image/png',
            null,
            true
        );
        $file6 = new UploadedFile(
            $src6,
            'Screenshot 2021-12-23 at 10-31-38 Dreamception - Admin.png',
            'image/png',
            null,
            true
        );
        $file7 = new UploadedFile(
            $src7,
            'Screenshot 2021-12-23 at 10-18-12 LJM - Home.png',
            'image/png',
            null,
            true
        );
        $file8 = new UploadedFile(
            $src8,
            'Screenshot 2021-12-23 at 10-22-24 LJM - ChausseTout.png',
            'image/png',
            null,
            true
        );
        $gallery1->setImageFile($file1);
        $gallery1->setProject($this->getReference(ProjectFixtures::PROJECT1));
        $manager->persist($gallery1);
        $gallery2->setImageFile($file2);
        $gallery2->setProject($this->getReference(ProjectFixtures::PROJECT1));
        $manager->persist($gallery2);
        $gallery3->setImageFile($file3);
        $gallery3->setProject($this->getReference(ProjectFixtures::PROJECT2));
        $manager->persist($gallery3);
        $gallery4->setImageFile($file4);
        $gallery4->setProject($this->getReference(ProjectFixtures::PROJECT2));
        $manager->persist($gallery4);
        $gallery5->setImageFile($file5);
        $gallery5->setProject($this->getReference(ProjectFixtures::PROJECT3));
        $manager->persist($gallery5);
        $gallery6->setImageFile($file6);
        $gallery6->setProject($this->getReference(ProjectFixtures::PROJECT3));
        $manager->persist($gallery6);
        $gallery7->setImageFile($file7);
        $gallery7->setProject($this->getReference(ProjectFixtures::PROJECT4));
        $manager->persist($gallery7);
        $gallery8->setImageFile($file8);
        $gallery8->setProject($this->getReference(ProjectFixtures::PROJECT4));
        $manager->persist($gallery8);

        $manager->flush();

        $this->addReference(self::GALLERY1, $gallery1);
        $this->addReference(self::GALLERY2, $gallery2);
        $this->addReference(self::GALLERY3, $gallery3);
        $this->addReference(self::GALLERY4, $gallery4);
        $this->addReference(self::GALLERY5, $gallery5);
        $this->addReference(self::GALLERY6, $gallery6);
        $this->addReference(self::GALLERY7, $gallery7);
        $this->addReference(self::GALLERY8, $gallery8);
    }
    public function getDependencies()
    {
        return [
            ProjectFixtures::class,
        ];
    }
}
