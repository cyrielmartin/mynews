<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ArticleController extends Controller
{
    /**
     * @Route("/")
     */
    public function showAction()
    {
        $articles = $this->getDoctrine()->getRepository('AppBundle:Article')->findAll();

        return $this->render('Article/show.html.twig', array(
            'articles' => $articles,
        ));
    }

    /**
     * @Route("/article/{id}")
     */
    public function viewAction($id)
    {
        $article = $this->getDoctrine()->getRepository('AppBundle:Article')->find($id);

        if (!$article) {
            throw $this->createNotFoundException(
                'Cet article n\'existe pas'
            );
        }        
        return $this->render('Article/view.html.twig', array(
            'article' => $article
        ));
    }

    /**
     * @Route("/new")
     */
    public function createAction()
    {
        return $this->render('AppBundle:Article:create.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/edit/{id}")
     */
    public function editAction($id)
    {
        return $this->render('AppBundle:Article:edit.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/delete/{id}")
     */
    public function deleteAction($id)
    {
        return $this->render('AppBundle:Article:delete.html.twig', array(
            // ...
        ));
    }

}
