<?php

namespace App\Controller;

use App\Entity\AboutMe;
use App\Repository\AboutMeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutMeController extends AbstractController
{
    /**
     * @Route("/", name="aboutme")
     */
    public function index(AboutMeRepository $aboutMeRepo): Response
    {
        return $this->render('about_me/index.html.twig', [
            'aboutMe' => $aboutMeRepo->findAll(),
        ]);
    }

    public function footer(AboutMeRepository $aboutMeRepo): Response
    {
        return $this->render('_footerlinks.html.twig', [
            'aboutMe' => $aboutMeRepo->findAll(),
        ]);
    }
}
