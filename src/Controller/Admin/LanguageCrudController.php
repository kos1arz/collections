<?php

namespace App\Controller\Admin;

use App\Entity\Language;
use App\Controller\Admin\Traits\BaseTrait;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class LanguageCrudController extends AbstractCrudController
{
    use BaseTrait;

    public static function getEntityFqcn(): string
    {
        return Language::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', 'Name'),
            TextField::new('code', 'Code'),
            TextField::new('flag', 'flaga'),
            BooleanField::new('active', 'Active'),
        ];
    }
}
