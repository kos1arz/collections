<?php

namespace App\Repository;

use App\Entity\CourseTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CourseTranslation>
 *
 * @method CourseTranslation|null find($id, $lockMode = null, $lockVersion = null)
 * @method CourseTranslation|null findOneBy(array $criteria, array $orderBy = null)
 * @method CourseTranslation[]    findAll()
 * @method CourseTranslation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CourseTranslationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CourseTranslation::class);
    }

//    /**
//     * @return CourseTranslation[] Returns an array of CourseTranslation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CourseTranslation
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
