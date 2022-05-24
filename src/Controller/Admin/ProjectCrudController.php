<?php

namespace App\Controller\Admin;

use App\Entity\Project;
use App\Form\GalleryType;
use App\Form\ProjectType;
use App\Form\TechnoType;
use App\Service\Slugify;
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

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            TextField::new('link'),
            SlugField::new('slug')->setTargetFieldName('name'),
            TextareaField::new('description'),
            CollectionField::new('images')
            ->setEntryType(GalleryType::class)
            ->onlyOnForms(),
            CollectionField::new('technos')
            ->setEntryType(TechnoType::class),

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
