<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $categories = $this->getDoctrine()
                        ->getRepository('AppBundle:Category')
                        ->findAll();

        return $this->render('/home/index.html.twig', [
            'categories' => $categories
        ]);
    }
}
