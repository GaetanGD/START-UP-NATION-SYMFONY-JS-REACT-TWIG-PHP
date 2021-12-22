<?php

namespace App\Repository;

use App\Entity\TravelActivity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TravelActivity|null find($id, $lockMode = null, $lockVersion = null)
 * @method TravelActivity|null findOneBy(array $criteria, array $orderBy = null)
 * @method TravelActivity[]    findAll()
 * @method TravelActivity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TravelActivityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TravelActivity::class);
    }

    // /**
    //  * @return TravelActivity[] Returns an array of TravelActivity objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TravelActivity
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
