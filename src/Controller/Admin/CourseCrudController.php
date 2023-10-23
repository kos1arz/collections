<?php

namespace App\Controller\Admin;

use App\Entity\Course;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
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
                FormField::addColumn(6),
                    TextField::new('name', 'Name'),
                    DateTimeField::new('startDate', 'Start date')->setColumns(5),
                    BooleanField::new('isPublished', 'Published')->setColumns(5),
                    AssociationField::new('categories', 'Categories')
                        ->setFormTypeOptions([
                            'by_reference' => false,
                            'multiple' => true
                        ]),
                    TextareaField::new('shortDescription', 'Short description')->hideOnIndex(),
                    TextareaField::new('info', 'Info')->hideOnIndex(),

                FormField::addColumn(6),
                    AssociationField::new('country', 'Country')
                        ->setQueryBuilder(function ($queryBuilder) {
                            return $queryBuilder->andWhere('entity.active = true');
                        }),
                    AssociationField::new('currency', 'Currency')
                        ->setQueryBuilder(function ($queryBuilder) {
                            return $queryBuilder->andWhere('entity.active = true');
                        }),
                    MoneyField::new('price', 'Price')->setCurrency('PLN')->setStoredAsCents(false)->setColumns(6),
                    MoneyField::new('promotionalPrice', 'Promotional Price')->setCurrency('PLN')->setStoredAsCents(false)->setColumns(6),

            FormField::addTab('Czego się nauczysz'),
                FormField::addColumn(6),
                    FormField::addFieldset('Pierwszy box'),
                        TextField::new('learningOutcomesFirstBoxTitle', 'Title')->hideOnIndex(),
                        TextareaField::new('learningOutcomesFirstBoxDescription', 'Description')->hideOnIndex(),
                        ArrayField::new('learningOutcomesFirstBoxList', 'List')->hideOnIndex(),

                FormField::addColumn(6),
                    FormField::addFieldset('Drugi box'),
                        TextField::new('learningOutcomesSecondBoxTitle', 'Title')->hideOnIndex(),
                        TextareaField::new('learningOutcomesSecondBoxDescription', 'Description')->hideOnIndex(),

                FormField::addColumn(12),
                    TextareaField::new('learningOutcomesInfo', 'Info')->hideOnIndex(),

            FormField::addTab('Program szkolenia'),
                TextareaField::new('trainingProgramsTitle', 'Title')->hideOnIndex(),

                FormField::addColumn(6),
                    FormField::addFieldset('Część teoretyczna'),
                    TextareaField::new('trainingProgramsTheoreticalDescription', 'Description')->hideOnIndex(),
                    ArrayField::new('trainingProgramsTheoreticalList', 'List')->hideOnIndex(),
                    TextareaField::new('trainingProgramsTheoreticalInfo', 'Info')->hideOnIndex(),

                FormField::addColumn(6),
                    FormField::addFieldset('Część praktyczna'),
                    TextareaField::new('trainingProgramsPracticalDescription', 'Description')->hideOnIndex(),
                    ArrayField::new('trainingProgramsPracticalList', 'List')->hideOnIndex(),
                    TextareaField::new('trainingProgramsPracticalInfo', 'Info')->hideOnIndex(),


            FormField::addTab('Dodatkowe informacje'),
                TextareaField::new('extraDetailsInfo', 'Info')->hideOnIndex(),
                ArrayField::new('extraDetailsList', 'List')->hideOnIndex(),


            DateTimeField::new('createdAt', 'Created At')->onlyOnIndex(),
            DateTimeField::new('updatedAt', 'Updated At')->onlyOnIndex(),
        ];
    }
}
