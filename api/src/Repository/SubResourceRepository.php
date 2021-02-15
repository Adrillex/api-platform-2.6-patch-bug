<?php

namespace App\Repository;

use App\Entity\SubResource;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SubResource|null find($id, $lockMode = null, $lockVersion = null)
 * @method SubResource|null findOneBy(array $criteria, array $orderBy = null)
 * @method SubResource[]    findAll()
 * @method SubResource[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubResourceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SubResource::class);
    }

    // /**
    //  * @return SubResource[] Returns an array of SubResource objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SubResource
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
