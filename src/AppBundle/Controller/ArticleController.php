<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use AppBundle\Form\ArticleType;
use Symfony\Component\HttpFoundation\Request;
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
    public function createAction(Request $request)
    {
        $article = new Article();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted()&& $form->isValid()) {
            $article = $form->getData();
            $em->persist($article);
            $em->flush();

            return $this->redirect('/');
        }
        
        return $this->render('Article/create.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/edit/{id}")
     */
    public function editAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository('AppBundle:Article')->find($id);
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if (!$article) {
            throw $this->createNotFoundException(
                'Aie aie Aie'
            );
        }
        
        if ($form->isSubmitted()&& $form->isValid()) {
            $article = $form->getData();
            $em->persist($article);
            $em->flush();

            return $this->redirect('/');
        }

        return $this->render('Article/create.html.twig', array(
            'form' => $form->createView(),
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
