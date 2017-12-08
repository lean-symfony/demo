<?php

namespace App\Controller;

use App\Repository\ActorRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ActorController extends Controller
{
    /**
     * @Route("/actor", name="actor_list")
     * @Route("/actor/page/{page}", name="actor_page", requirements={"page"="\d+"})
     */
    public function index(ActorRepository $actorRepository, int $page = 1)
    {
        $actors = $actorRepository->findBy([],[], 20, ($page-1)*20);
        $pages = $actorRepository->count() / 20;

        // replace this line with your own code!
        return $this->render('actor/index.html.twig', [
            'pages' => $pages,
            'current_page' => $page,
            'actors' => $actors
        ]);
    }
}
