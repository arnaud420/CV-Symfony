<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Comment;
use AppBundle\Form\CommentType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CommentController extends Controller
{
    /**
     * @Route("comment/{post_id}/create", name="create_comment")
     */
    public function createAction(Request $request, $post_id)
    {
        $post = $this->getDoctrine()->getRepository('AppBundle:Post')->find($post_id);
        $comment = new Comment();
        $comment->setPost($post);

        $form = $this->createForm(CommentType::class, $comment);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();

            return "ok";
        }

        return $this->render('comment/create.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
