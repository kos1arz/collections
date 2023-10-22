<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;
use App\Repository\CourseRepository;

class TrainingController extends AbstractController
{
    #[Route('/szkolenia', name: 'training_list')]
    public function list(Request $request, CourseRepository $courseRepository, PaginatorInterface $paginator): Response
    {
        $query = $courseRepository->createQueryBuilder('c')
            ->getQuery();
        $itemsPerPage = $request->query->getInt('items', 1);
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            $itemsPerPage
        );

        return $this->render('training/list/index.html.twig', [
            'pagination' => $pagination,
            'itemsPerPage' => $itemsPerPage
        ]);
    }

    #[Route('/szkolenia/{id}', name: 'training_details', requirements: ['id' => '\d+'])]
    public function details(int $id, CourseRepository $courseRepository): Response
    {
        $course = $courseRepository->find($id);

        if (!$course) {
            return $this->redirectToRoute('training_list');
        }

        $formatter = new \IntlDateFormatter(
            'pl_PL',
            \IntlDateFormatter::LONG,
            \IntlDateFormatter::SHORT
        );

        return $this->render('training/details/index.html.twig', [
            'course' => $course,
            'startDate' => $formatter->format($course->getStartDate()),
        ]);
    }
}
