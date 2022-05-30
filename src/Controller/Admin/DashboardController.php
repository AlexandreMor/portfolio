<?php

namespace App\Controller\Admin;

use App\Entity\AboutMe;
use App\Entity\Contact;
use App\Entity\Project;
use App\Entity\Techno;
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
            ->setTitle('Administration du portfolio');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::section('Liens'),
            MenuItem::linkToDashboard('Accueil admin', 'fa fa-home'),
            MenuItem::linkToRoute('Retour au site', 'fa fa-home', 'aboutme'),
            MenuItem::section("Page d'accueil"),
            MenuItem::linkToCrud('A propos de moi', 'fa fa-question', AboutMe::class),
            MenuItem::section('Configuration des projets'),
            MenuItem::linkToCrud('Technologies', 'fa fa-code', Techno::class),
            MenuItem::linkToCrud('Projets', 'fa fa-folder-open', Project::class),
            MenuItem::section('Réception des messages'),
            MenuItem::linkToCrud('Contacts', 'fa fa-pen', Contact::class),
            MenuItem::section('Gestion utilisateurs'),
            MenuItem::linkToCrud('Utilisateurs', 'fa fa-user', User::class),
            MenuItem::linkToLogout('Se déconnecter', 'fa fa-exit'),
        ];
    }
}
