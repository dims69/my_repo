<?php

namespace App\Repository;

use App\Entity\Apropos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\EntityRepository;

/**
 * @method Apropos|null find($id, $lockMode = null, $lockVersion = null)
 * @method Apropos|null findOneBy(array $criteria, array $orderBy = null)
 * @method Apropos[]    findAll()
 * @method Apropos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AproposRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Apropos::class);
    }
    
    public function findAllFormations()
    {
        $qBuilder = $this
        ->getEntityManager()
        ->createQueryBuilder();
        
        $qBuilder ->select('f');
        $qBuilder ->from('AppBundle : Formation', 'f');
        
        $result = $qBuilder->getQuery()->getResult();
        
        return $result;
    }
    

    // /**
    //  * @return Apropos[] Returns an array of Apropos objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Apropos
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
