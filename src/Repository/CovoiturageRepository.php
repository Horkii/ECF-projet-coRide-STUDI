<?php

namespace App\Repository;

use App\Entity\Covoiturage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CovoiturageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Covoiturage::class);
    }

    /**
     * Recherche les trajets avec un mot-clé.
     *
     * @param string $search
     * @return Covoiturage[]
     */
    public function searchTrajets(string $search)
    {
        return $this->createQueryBuilder('c')
            ->where('c.lieu_depart LIKE :search')
            ->setParameter('search', '%' . $search . '%')
            ->getQuery()
            ->getResult();
    }

    /**
     * Applique un tri sur les trajets (par prix ou note chauffeur).
     *
     * @param string $order
     * @return Covoiturage[]
     */
    public function getSortedTrajets(string $order)
    {
        $qb = $this->createQueryBuilder('c');

        switch ($order) {
            case 'prix_asc':
                $qb->orderBy('c.prix', 'ASC');
                break;
            case 'prix_desc':
                $qb->orderBy('c.prix', 'DESC');
                break;
            case 'arrivee_asc':
                $qb->orderBy('c.date_arrivee', 'ASC');
                break;
            case 'meilleure_note':
                // Assuming there is a relationship with the "Avis" table
                $qb->join('App\Entity\Avis', 'a', 'WITH', 'a.chauffeur = c.chauffeur')
                   ->addSelect('AVG(a.note) as avg_note')
                   ->groupBy('c.id')
                   ->orderBy('avg_note', 'DESC');
                break;
            default:
                break;
        }

        return $qb->getQuery()->getResult();
    }
}
