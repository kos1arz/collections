<?php

namespace App\Controller\Admin;

use App\Entity\VichFile;
use App\Form\Admin\VichFileField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use App\Controller\Admin\Traits\BaseTrait;

class FileCrudController extends AbstractCrudController
{
    use BaseTrait;

    public static function getEntityFqcn(): string
    {
        return VichFile::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            VichFileField::new('image')->hideOnForm(),
            VichFileField::new('imageFile')->onlyOnForms(),
            NumberField::new('imageSize', 'Size')->onlyOnIndex(),
            DateTimeField::new('createdAt', 'Created At')->onlyOnIndex(),
            DateTimeField::new('updatedAt', 'Updated At')->onlyOnIndex(),
        ];
    }
}
