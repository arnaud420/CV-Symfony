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

        if (!$category) {
            throw $this->createNotFoundException('Unable to find category.');
        }


        $posts = $category->getPosts();

        return $this->render('category/index.html.twig', [
            'category' => $category,
            'posts' => $posts
        ]);
    }
}
