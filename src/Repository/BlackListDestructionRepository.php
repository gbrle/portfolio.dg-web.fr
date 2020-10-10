<?php

namespace App\Repository;

use App\Entity\BlackListDestruction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BlackListDestruction|null find($id, $lockMode = null, $lockVersion = null)
 * @method BlackListDestruction|null findOneBy(array $criteria, array $orderBy = null)
 * @method BlackListDestruction[]    findAll()
 * @method BlackListDestruction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BlackListDestructionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BlackListDestruction::class);
    }

    // /**
    //  * @return BlackListDestruction[] Returns an array of BlackListDestruction objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BlackListDestruction
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
