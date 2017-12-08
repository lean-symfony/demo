<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\ControllerTrait;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Twig\Environment;

/**
 * Class MainController
 * @package App\Controller
 *
 */
class MainController extends Controller
{


//    /**
//     * @var Environment
//     */
//    private $twig;
//
//    /**
//     * MainController constructor.
//     * @param Environment $twig
//     */
//    public function __construct(Environment $twig)
//    {
//        $this->twig = $twig;
//    }
//
//    /**
//     * @return Response
//     *
//     * @Route("/", name="homepage")
//     */
//    public function index() {
//        return new Response($this->twig->render('main/index.html.twig', []));
//    }

    /**
     * @return Response
     *
     * @Route("/", name="homepage")
     */
    public function index() {
        return $this->render('main/index.html.twig', []);
    }

    /**
     * @return Response
     *
     * @Route("/ctrlArg", name="homepageCtrlArg")
     */
    public function indexCtrlArg(Environment $twig) {
        return new Response($twig->render('main/index.html.twig', []));
    }

    /**
     * @return mixed
     *
     * @Route("/tpl", name="homepageTpl")
     * @Template("main/index.html.twig")
     */
    public function indexTpl() {
        return [];
    }

}