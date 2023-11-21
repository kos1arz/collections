<?php

namespace App\Repository;

use App\Entity\CategoryLanguage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CategoryLanguage>
 *
 * @method CategoryLanguage|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoryLanguage|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoryLanguage[]    findAll()
 * @method CategoryLanguage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryLanguageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategoryLanguage::class);
    }
}
