<?php

namespace App\Controller\Admin;

use App\Entity\Country;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Filter\BooleanFilter;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CountryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Country::class;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('name')
            ->add(BooleanFilter::new('active'));
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->add(Crud::PAGE_EDIT, Action::EDIT)
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        $name = TextField::new('Name', 'Name');
        $flag = TextField::new('flag', 'Flag');
        $cca2 = TextField::new('cca2');
        $cca3 = TextField::new('cca3');
        $active = BooleanField::new('active', 'Active');
        $currency = AssociationField::new('currency', 'Currency');

        if (Crud::PAGE_INDEX === $pageName) {
            return [$name, $active];
        }

        return [$name, $flag, $cca2, $cca3, $active, $currency];
    }
}
