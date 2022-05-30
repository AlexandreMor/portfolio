<?php

namespace App\Controller\Admin;

use App\Entity\Project;
use App\Form\GalleryType;
use App\Form\ProjectType;
use App\Form\TechnoType;
use App\Service\Slugify;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\ChoiceList\View\ChoiceView;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProjectCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return Project::class;
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
            ->setPageTitle('index', '<h2 class="text-center" style="font-weight: bold;">Liste des projets</h2>')
            ->setPageTitle('new', '<h2 class="text-center" style="font-weight: bold;">Ajouter un projet</h2>')
            ->setPageTitle('edit', '<h2 class="text-center" style="font-weight: bold;">Modifier un projet </h2>')
            ->setPageTitle('detail', '<h2 class="text-center" style="font-weight: bold;">Détails du projet</h2>');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', 'Nom'),
            TextField::new('link', 'Lien'),
            SlugField::new('slug')->setTargetFieldName('name'),
            TextareaField::new('description'),
            CollectionField::new('images')
                ->setEntryType(GalleryType::class)
                ->onlyOnForms(),
            AssociationField::new('technos', 'Technologies')

        ];
    }

    public static function getProjectEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => ['setProjectSlug'],
        ];
    }

    public function setProjectSlug(BeforeEntityPersistedEvent $event, Slugify $slugify)
    {
        $entity = $event->getEntityInstance();

        if (!($entity instanceof Project)) {
            return;
        }

        $slug = $slugify->generate($entity->getName());
        $entity->setSlug($slug);
    }
}
