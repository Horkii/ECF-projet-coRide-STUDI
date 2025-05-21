<?php
namespace App\Controller;

use App\Repository\CovoiturageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CovoiturageController extends AbstractController
{
    #[Route('/covoiturage', name: 'covoiturage')]
    public function index(): Response
    {
        return $this->render('covoiturage/index.html.twig');
    }

    #[Route('/api/trajets', name: 'app_covoiturage_api', methods: ['GET'])]
    public function getTrajets(
        Request $request, 
        CovoiturageRepository $covoiturageRepository
    ): Response {
        // Récupérer les paramètres de recherche et de tri
        $search = $request->query->get('search', '');
        $sort = $request->query->get('sort', '');

        // Logique de recherche et de filtrage
        $trajets = $covoiturageRepository->searchTrajets($search, $sort);

        // Convertir les résultats en tableau pour la réponse JSON
        $formattedTrajets = array_map(function($trajet) {
            return [
                'date_depart' => $trajet->getDateDepart()->format('d/m/Y'),
                'heure_depart' => $trajet->getHeureDepart()->format('H:i'),
                'lieu_depart' => $trajet->getLieuDepart(),
                'lieu_arrivee' => $trajet->getLieuArrivee(),
                'places_disponibles' => $trajet->getNbPlace(),
                'prix' => $trajet->getPrixPersonne()
            ];
        }, $trajets);

        return $this->json($formattedTrajets);
    }
}
