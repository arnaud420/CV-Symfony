<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class PostController extends Controller
{
    /**
     * @Route("/post/{post_id}", name="post_show")
     */
    public function showAction(Request $request, $post_id)
    {
        $em = $this->getDoctrine()->getManager();

        $post = $em
            ->getRepository('AppBundle:Post')
            ->find($post_id);

        if (!$post) {
            throw $this->createNotFoundException('Unable to find Post.');
        }

        $comments = $post->getComments();

        return $this->render('post/show.html.twig', [
            'post' => $post,
            'comments' => $comments
        ]);
    }
}
