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
        return $this->render('Article/show.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/article/{id}")
     */
    public function viewAction($id)
    {
        return $this->render('AppBundle:Article:view.html.twig', array(
            // ...
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
