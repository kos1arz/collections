<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use App\Controller\Admin\Traits\BaseTrait;

class CategoryController extends AbstractCrudController
{
    use BaseTrait;

    public static function getEntityFqcn(): string
    {
        return Category::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return parent::configureCrud($crud)
            ->overrideTemplates([
                'crud/new' => 'admin/languages/new.html.twig',
                'crud/edit' => 'admin/languages/edit.html.twig'
            ]);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('childLanguage.name', 'Name')->setRequired(true)->hideOnIndex(),
            TextField::new('childLanguage.slug', 'Slug')->setRequired(true)->hideOnIndex(),
            DateTimeField::new('createdAt', 'Created At')->onlyOnIndex(),
            DateTimeField::new('updatedAt', 'Updated At')->onlyOnIndex(),
        ];
        // $fields = [
        //     'name',
        //     'slug',
        // ];

        // if ($pageName === Crud::PAGE_INDEX) {
        //     array_unshift($fields, IdField::new('id')->setLabel('Main Id'));
        // }

        // return $fields;
    }
}
