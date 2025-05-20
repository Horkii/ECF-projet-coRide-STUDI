<?php

namespace App\Repository;

use App\Entity\Avis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class AvisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Avis::class);
    }

    /**
     * Récupère la note moyenne d'un chauffeur pour un trajet donné.
     *
     * @param int $chauffeurId
     * @return float
     */
    public function getAverageRating(int $chauffeurId): float
    {
        $qb = $this->createQueryBuilder('a')
            ->select('AVG(a.note) as avg_note')
            ->where('a.chauffeur = :chauffeurId')
            ->setParameter('chauffeurId', $chauffeurId);

        $result = $qb->getQuery()->getSingleScalarResult();

        return (float) $result;
    }

    /**
     * Récupère tous les avis pour un chauffeur spécifique.
     *
     * @param int $chauffeurId
     * @return Avis[]
     */
    public function findByChauffeur(int $chauffeurId)
    {
        return $this->createQueryBuilder('a')
            ->where('a.chauffeur = :chauffeurId')
            ->setParameter('chauffeurId', $chauffeurId)
            ->getQuery()
            ->getResult();
    }
}
