<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use App\Controller\Admin\Traits\BaseTrait;

class CategoryController extends AbstractCrudController
{
    use BaseTrait;

    public static function getEntityFqcn(): string
    {
        return Category::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $fields = [
            'name',
            'slug',
        ];

        if ($pageName === Crud::PAGE_INDEX) {
            array_unshift($fields, IdField::new('id')->setLabel('Main Id'));
        }

        return $fields;
    }
}
