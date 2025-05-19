<?php 
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class FiltreTrajetController extends AbstractController
{
    #[Route('/projects/filter', name: 'project_filter', methods: ['GET'])]
    public function filter(Request $request): JsonResponse
    {
        $type = $request->query->get('type');
        
        // Exemple simple de retour pour tester que ça marche
        return $this->json([
            'type_recu' => $type,
            'message' => 'Requête traitée avec succès'
        ]);
    }
    #[Route('/projects', name: 'project_index')]
    public function index()
    {
        return $this->render('index.html.twig');
    }
}
