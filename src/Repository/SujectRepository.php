<?php

namespace App\Repository;

use App\Entity\Suject;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Suject|null find($id, $lockMode = null, $lockVersion = null)
 * @method Suject|null findOneBy(array $criteria, array $orderBy = null)
 * @method Suject[]    findAll()
 * @method Suject[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SujectRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Suject::class);
    }

    // /**
    //  * @return Suject[] Returns an array of Suject objects
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
    public function findOneBySomeField($value): ?Suject
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
