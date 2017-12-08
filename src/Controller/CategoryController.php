<?php

namespace App\Controller;

use App\Entity\Actor;
use App\Entity\Category;
use App\Repository\CategoryRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    /**
     * @Route("/category", name="category")
     */
    public function index(CategoryRepository $repo)
    {
        $categories = $repo->findAll();

        // replace this line with your own code!
        return $this->render('category/index.html.twig',
            [ 'categories' => $categories ]);
    }
}
