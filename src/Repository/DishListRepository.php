<?php

namespace App\Repository;

use App\Entity\DishList;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DishList|null find($id, $lockMode = null, $lockVersion = null)
 * @method DishList|null findOneBy(array $criteria, array $orderBy = null)
 * @method DishList[]    findAll()
 * @method DishList[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DishListRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DishList::class);
    }

    // /**
    //  * @return DishList[] Returns an array of DishList objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DishList
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
