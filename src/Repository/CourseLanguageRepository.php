<?php

namespace App\Repository;

use App\Entity\CourseLanguage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CourseLanguage>
 *
 * @method CourseLanguage|null find($id, $lockMode = null, $lockVersion = null)
 * @method CourseLanguage|null findOneBy(array $criteria, array $orderBy = null)
 * @method CourseLanguage[]    findAll()
 * @method CourseLanguage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CourseLanguageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CourseLanguage::class);
    }
}
