<?php

namespace App\Controller\Admin;

use App\Entity\AboutMe;
use App\Entity\Contact;
use App\Entity\Gallery;
use App\Entity\Project;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Portofolio');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Accueil admin', 'fa fa-home');
        yield MenuItem::linkToRoute('Retour au site', 'fa fa-tags', 'aboutme');
        yield MenuItem::linkToCrud('A propos de moi', 'fa fa-tags', AboutMe::class);
        yield MenuItem::linkToCrud('Projets', 'fa fa-tags', Project::class);
        yield MenuItem::linkToCrud('Contacts','fa fa-tags',Contact::class);
        yield MenuItem::linkToCrud('Utilisateur', 'fa fa-tags', User::class);
        yield MenuItem::linkToCrud("Galerie d'images", 'fa fa-tags', Gallery::class);
        yield MenuItem::linkToLogout('Se déconnecter', 'fa fa-exit');
    }
}
