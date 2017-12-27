<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Comment;
use AppBundle\Form\CommentType;
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

        $images = $post->getImages();

        $comments = $post->getComments();

        $comment = new Comment();
        $comment->setPost($post);

        $form = $this->createForm(CommentType::class, $comment);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid())
        {
            $em->persist($comment);
            $em->flush();

            return $this->redirect($this->generateUrl('post_show', ['post_id' => $post->getId()]));
        }

        return $this->render('post/show.html.twig', [
            'post' => $post,
            'comments' => $comments,
            'form' => $form->createView(),
            'images' => $images
        ]);
    }
}
