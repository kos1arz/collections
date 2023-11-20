<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Category;
use App\Entity\Course;
use App\Entity\Country;
use App\Entity\VichFile;
use App\Entity\Language;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        return $this->render('admin/main.html.twig');
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('App')
            ->setTranslationDomain('admin')
            ->setLocales([
                'en' => '🇬🇧 English',
                'pl' => '🇵🇱 Polski'
            ]);
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::section('Entities');
        yield MenuItem::linkToCrud('Courses', 'fas fa-university', Course::class);
        yield MenuItem::linkToCrud('Categories', 'fa fa-tags', Category::class);
        yield MenuItem::linkToCrud('File', 'fas fa-file', VichFile::class);

        yield MenuItem::section('Settings');
        yield MenuItem::linkToCrud('Users', 'fa fa-user', User::class);
        yield MenuItem::linkToCrud('Language', 'fa fa-language', Language::class);
        yield MenuItem::linkToCrud('Countries', 'fas fa-globe', Country::class);
    }
}
