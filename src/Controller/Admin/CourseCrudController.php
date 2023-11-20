<?php

namespace App\Controller\Admin;

use App\Entity\Course;
use App\Entity\Language;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use Symfony\Component\HttpFoundation\RequestStack;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use App\Controller\Admin\Traits\BaseTrait;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;

class CourseCrudController extends AbstractCrudController
{
    use BaseTrait;

    public function __construct(
        private RequestStack $requestStack,
        private EntityManagerInterface $entityManager,
    ) {}

    public static function getEntityFqcn(): string
    {
        return Course::class;
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
            FormField::addTab('Main'),
                FormField::addColumn(6),
                    TextField::new('childLanguage.name', 'Name')->setRequired(true)->hideOnIndex(),
                    DateTimeField::new('startDate', 'Start date')->setColumns(5),
                    BooleanField::new('childLanguage.isPublished', 'Published')->setColumns(5)->hideOnIndex(),
                    AssociationField::new('categories', 'Categories')
                        ->setFormTypeOptions([
                            'by_reference' => false,
                            'multiple' => true
                        ]),
                    TextareaField::new('childLanguage.shortDescription', 'Short description')->hideOnIndex(),
                    TextareaField::new('childLanguage.info', 'Info')->hideOnIndex(),

                FormField::addColumn(6),
                    AssociationField::new('country', 'Country')
                        ->setQueryBuilder(function ($queryBuilder) {
                            return $queryBuilder->andWhere('entity.active = true');
                        }),
                    AssociationField::new('currency', 'Currency')->onlyOnIndex()->setFormTypeOptions(['disabled' => true]),
                    NumberField::new('price', 'Price')
                        ->setColumns(6)
                        ->setNumDecimals(2)
                        ->setRequired(true),
                    NumberField::new('promotionalPrice', 'Promotional Price')
                        ->setColumns(6)
                        ->setNumDecimals(2),

            FormField::addTab('What you will learn'),
                FormField::addColumn(6),
                    FormField::addFieldset('First box'),
                        TextField::new('childLanguage.learningOutcomesFirstBoxTitle', 'Title')->hideOnIndex(),
                        TextareaField::new('childLanguage.learningOutcomesFirstBoxDescription', 'Description')->hideOnIndex(),
                        ArrayField::new('childLanguage.learningOutcomesFirstBoxList', 'List')->hideOnIndex(),

                FormField::addColumn(6),
                    FormField::addFieldset('Second box'),
                        TextField::new('childLanguage.learningOutcomesSecondBoxTitle', 'Title')->hideOnIndex(),
                        TextareaField::new('childLanguage.learningOutcomesSecondBoxDescription', 'Description')->hideOnIndex(),

                FormField::addColumn(12),
                    TextareaField::new('childLanguage.learningOutcomesInfo', 'Info')->hideOnIndex(),

            FormField::addTab('Training program'),
                TextareaField::new('childLanguage.trainingProgramsTitle', 'Title')->hideOnIndex(),

                FormField::addColumn(6),
                    FormField::addFieldset('Theoretical part'),
                    TextareaField::new('childLanguage.trainingProgramsTheoreticalDescription', 'Description')->hideOnIndex(),
                    ArrayField::new('childLanguage.trainingProgramsTheoreticalList', 'List')->hideOnIndex(),
                    TextareaField::new('childLanguage.trainingProgramsTheoreticalInfo', 'Info')->hideOnIndex(),

                FormField::addColumn(6),
                    FormField::addFieldset('Practical part'),
                    TextareaField::new('childLanguage.trainingProgramsPracticalDescription', 'Description')->hideOnIndex(),
                    ArrayField::new('childLanguage.trainingProgramsPracticalList', 'List')->hideOnIndex(),
                    TextareaField::new('childLanguage.trainingProgramsPracticalInfo', 'Info')->hideOnIndex(),


            FormField::addTab('Additional information'),
                TextareaField::new('childLanguage.extraDetailsInfo', 'Info')->hideOnIndex(),
                ArrayField::new('childLanguage.extraDetailsList', 'List')->hideOnIndex(),


            DateTimeField::new('createdAt', 'Created At')->onlyOnIndex(),
            DateTimeField::new('updatedAt', 'Updated At')->onlyOnIndex(),
        ];
    }
}
