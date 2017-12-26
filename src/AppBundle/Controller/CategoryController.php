<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


class CategoryController extends Controller
{
    /**
     * @Route("/category/{category_id}", name="blog")
     */
    public function indexAction(Request $request, $category_id)
    {
        $em = $this->getDoctrine()->getManager();

        $category = $em
            ->getRepository('AppBundle:Category')
            ->find($category_id);

        $posts = $category->getPosts();

        return $this->render('blog/index.html.twig', [
            'posts' => $posts
        ]);
    }
}
