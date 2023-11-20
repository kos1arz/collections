<?php

declare(strict_types=1);

namespace App\Form\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Field\FieldTrait;
use EasyCorp\Bundle\EasyAdminBundle\Contracts\Field\FieldInterface;

class ManyLanguagesField implements FieldInterface {

    use FieldTrait;

    public static function new(string $propertyName, ?string $label = null)
    {
        return (new self())
            ->setProperty($propertyName)
            ->setLabel($label)
            ->setTemplateName('admin/languages/many_languages_field.html.twig')
            ->setFormTypeOptions(['mapped' => false, 'required' => false]);
    }
}
