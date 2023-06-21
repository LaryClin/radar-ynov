<?php

namespace App\Repository\Api;

use App\Entity\Radar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Radar>
 *
 * @method Radar|null find($id, $lockMode = null, $lockVersion = null)
 * @method Radar|null findOneBy(array $criteria, array $orderBy = null)
 * @method Radar[]    findAll()
 * @method Radar[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApiRadarRepository 
{
    // public function __construct(ManagerRegistry $registry)
    // {
    //     parent::__construct($registry, Radar::class);
    // }

    // public function save(Radar $entity, bool $flush = false): void
    // {
    //     $this->getEntityManager()->persist($entity);

    //     if ($flush) {
    //         $this->getEntityManager()->flush();
    //     }
    // }

    // public function remove(Radar $entity, bool $flush = false): void
    // {
    //     $this->getEntityManager()->remove($entity);

    //     if ($flush) {
    //         $this->getEntityManager()->flush();
    //     }
    // }

//    /**
//     * @return Radar[] Returns an array of Radar objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Radar
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
