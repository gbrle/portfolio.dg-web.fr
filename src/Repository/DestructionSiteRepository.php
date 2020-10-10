<?php

namespace App\Repository;

use App\Entity\DestructionSite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DestructionSite|null find($id, $lockMode = null, $lockVersion = null)
 * @method DestructionSite|null findOneBy(array $criteria, array $orderBy = null)
 * @method DestructionSite[]    findAll()
 * @method DestructionSite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DestructionSiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DestructionSite::class);
    }

    // /**
    //  * @return DestructionSite[] Returns an array of DestructionSite objects
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
    public function findOneBySomeField($value): ?DestructionSite
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
