<?php

namespace App\Controller;

use App\Form\ActorType;
use App\Repository\ActorRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @param ActorRepository $actorRepository
     * @param int $id
     *
     * @Route("/actor/edit/{id}", name="actor_edit", requirements={"id"="\d+"})
     */
    public function edit(Request $request, ActorRepository $actorRepository, int $id)
    {
        $actor = $actorRepository->find($id);

        if ($actor === null) {
            throw $this->createNotFoundException('Schauspieler existiert nicht');
        }

        $form = $this->createForm(ActorType::class, $actor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($actor);
            $em->flush();

            $this->addFlash('success', 'Schauspieler wurde geändert.');
            return $this->redirectToRoute('actor_list');
        }

        return $this->render('actor/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @param ActorRepository $actorRepository
     * @return JsonResponse
     *
     * @Route("/actor/export")
     */
    public function export(ActorRepository $actorRepository)
    {
        $actors = $actorRepository->findAll();

        //return new JsonResponse();
        return $this->json($actors);
    }
}
