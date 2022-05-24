<?php

namespace App\Controller;

use App\Entity\Project;
use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends AbstractController
{
    /**
     * @Route("/projects", name="projects")
     */
    public function index(ProjectRepository $projectRepo): Response
    {
        return $this->render('project/index.html.twig', [
            'projects' => $projectRepo->findAll(),
        ]);
    }
    /**
     * @Route("/projects/{slug}", name="project")
     */
    public function show($slug, ProjectRepository $projectRepo): Response
    {
        return $this->render('project/show.html.twig', [
            'project' => $projectRepo->findOneBy(['slug' => $slug]),
        ]);
    }
}
