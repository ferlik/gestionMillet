<?php

namespace App\Controller;

use App\DTO\CommandeArticleDTO;
use App\Entity\CommandeArticle;
use App\Form\CommandeArticleType;
use App\Repository\CommandeArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/commande/article")
 */
class CommandeArticleController extends AbstractController
{
    /**
     * @Route("/", name="commande_article_index", methods={"GET"})
     */
    public function index(CommandeArticleRepository $commandeArticleRepository): Response
    {
        return $this->render('commande_article/index.html.twig', [
            'commande_articles' => $commandeArticleRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="commande_article_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $commandeArticle = new CommandeArticle();
        $form = $this->createForm(CommandeArticleType::class, $commandeArticle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($commandeArticle);
            $entityManager->flush();

            return $this->redirectToRoute('commande_article_index');
        }

        return $this->render('commande_article/new.html.twig', [
            'commande_article' => $commandeArticle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="commande_article_show", methods={"GET"})
     */
    public function show(CommandeArticle $commandeArticle): Response
    {
        return $this->render('commande_article/show.html.twig', [
            'commande_article' => $commandeArticle,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="commande_article_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CommandeArticle $commandeArticle): Response
    {
        $form = $this->createForm(CommandeArticleType::class, $commandeArticle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('commande_article_index');
        }

        return $this->render('commande_article/edit.html.twig', [
            'commande_article' => $commandeArticle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="commande_article_delete", methods={"DELETE"})
     */
    public function delete(Request $request, CommandeArticle $commandeArticle): Response
    {
        if ($this->isCsrfTokenValid('delete' . $commandeArticle->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($commandeArticle);
            $entityManager->flush();
        }

        return $this->redirectToRoute('commande_article_index');
    }
}
