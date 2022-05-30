<?php

namespace App\Controller\Admin;

use App\Entity\Techno;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TechnoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Techno::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setLabel('Ajouter');
            })
            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                return $action->setLabel('Editer');
            })
            ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setLabel('Supprimer');
            })
            ->update(Crud::PAGE_EDIT, Action::SAVE_AND_RETURN, function (Action $action) {
                return $action->setLabel('Sauvegarder et quitter');
            })
            ->update(Crud::PAGE_EDIT, Action::SAVE_AND_CONTINUE, function (Action $action) {
                return $action->setLabel('Sauvegarder et continuer');
            });
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', '<h2 class="text-center" style="font-weight: bold;">Liste des technologies</h2>')
            ->setPageTitle('new', '<h2 class="text-center" style="font-weight: bold;">Ajouter une technologie</h2>')
            ->setPageTitle('edit', '<h2 class="text-center" style="font-weight: bold;">Modifier une technologie</h2>')
            ->setPageTitle('detail', '<h2 class="text-center" style="font-weight: bold;">Détails de la technologie</h2>');
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', 'Nom'),
        ];
    }
}
