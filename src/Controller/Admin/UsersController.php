<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Form\Admin\UserType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsersController extends AbstractCrudController
{

//    #[Route('/admin/users', name: 'app_admin_users_index')]
//    public function index(AdminContext $context): Response
//    {
//        return parent::index($context);
//    }


    public function configureActions(Actions $actions): Actions
    {
        $viewStripeInvoice = Action::new('viewInvoice', 'Invoice', 'fa fa-file-invoice')
            ->linkToUrl(function (User $entity) {
                return 'https://www.stripe.com/invoice/';
            });

        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->add(Crud::PAGE_EDIT, $viewStripeInvoice);
    }
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    #[Route('/admin/users/{id}', name: 'app_admin_users_edit')]
    public function edit(AdminContext $context): Response {
        parent::edit($context);

        $form = $this->createForm(UserType::class, $context->getEntity()->getInstance());

        $form->handleRequest($context->getRequest());

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            // Możesz dodać komunikat sukcesu lub przekierowanie gdziekolwiek chcesz
            $this->addFlash('success', 'Obiekt został zaktualizowany.');

            return $this->redirectToRoute('lista_obiektow'); // Przekierowanie do listy obiektów
        }

        return $this->render('admin/users/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}