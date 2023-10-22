<?php

namespace App\Controller\Admin;

use App\Entity\Course;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use App\Controller\Admin\Traits\BaseTrait;

class CourseCrudController extends AbstractCrudController
{
    use BaseTrait;

    public static function getEntityFqcn(): string
    {
        return Course::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addTab('Główne'),
            TextField::new('name', 'Name'),
            TextareaField::new('shortDescription', 'Short description')->hideOnIndex(),
            DateTimeField::new('startDate', 'Start date'),
            TextEditorField::new('content', 'Content')->setNumOfRows(30),
            AssociationField::new('categories', 'Categories')
                ->setFormTypeOptions([
                    'by_reference' => false,
                    'multiple' => true
                ]),
            MoneyField::new('price', 'Price')->setCurrency('PLN')->setStoredAsCents(false),
            MoneyField::new('promotionalPrice', 'Promotional Price')->setCurrency('PLN')->setStoredAsCents(false),
            BooleanField::new('isPublished', 'Published'),
            DateTimeField::new('createdAt', 'Created At')->onlyOnIndex(),
            DateTimeField::new('updatedAt', 'Updated At')->onlyOnIndex(),
            FormField::addTab('Dodatkowe informacje'),
            TextField::new('info', 'Info')->hideOnIndex(),
            ArrayField::new('list', 'List')->hideOnIndex(),
        ];
    }
}
