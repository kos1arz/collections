<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Form\Admin\UserType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Admin\Traits\BaseTrait;

class UsersController extends AbstractCrudController
{
    use BaseTrait;

    public function __construct(private AdminUrlGenerator $urlGenerator) {

    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('username'),
            TextField::new('lastname'),
            TextField::new('email'),
            DateField::new('bornDate'),
            BooleanField::new('enabled'),
            DateTimeField::new('lastLogin'),
        ];
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
            $entityManager = $this->container->get('doctrine')->getManager();
            $entityManager->flush();

            $this->addFlash('success', 'Obiekt został zaktualizowany.');

            if($context->getRequest()->request->all('ea')['newForm']['btn'] === Action::SAVE_AND_CONTINUE) {
                $url = $this->urlGenerator->setRoute('app_admin_users_edit', ['id' => $context->getEntity()->getInstance()->getId()])->generateUrl();
                return $this->redirect($url);
            }

            $url = $this->urlGenerator->setController(UsersController::class)->generateUrl();
            return $this->redirect($url);
        }

        return $this->render('admin/users/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
