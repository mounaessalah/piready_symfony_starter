<?php

namespace App\Repository;

use App\Entity\Artwork;
use App\Entity\Commande;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Artwork>
 */
class ArtworkRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Artwork::class);
    }
    public function findArtworksByCommande(Commande $commande): array
    {
        return $this->createQueryBuilder('a')
            ->join('a.commandes', 'c')
            ->where('c.id = :commandeId')
            ->setParameter('commandeId', $commande->getId())
            ->getQuery()
            ->getResult();
    }
    

//    public function findByExampleField($value): array
//    {public function findArtworksByCommande(Commande $commande): array


//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Artwork
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
