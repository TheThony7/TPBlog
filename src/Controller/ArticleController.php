<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\Article1Type;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/article')]
class ArticleController extends AbstractController
{
    #[Route('/', name: 'app_article_index', methods: ['GET'])]
    public function index(ArticleRepository $articleRepository): Response
    {
        return $this->render('article/index.html.twig', [
            'articles' => $articleRepository->findAll(),
        ]);
        
    }

    // #[Route('/new', name: 'app_article_new', methods: ['GET', 'POST'])]
    // public function new(Request $request, ArticleRepository $articleRepository): Response
    // {
    //     $article = new Article();
    //     $form = $this->createForm(Article1Type::class, $article);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $articleRepository->save($article, true);

    //         return $this->redirectToRoute('app_article_index', [], Response::HTTP_SEE_OTHER);
    //     }

    //     return $this->renderForm('article/new.html.twig', [
    //         'article' => $article,
    //         'form' => $form,
    //     ]);
    // }

    #[Route('/{id}', name: 'app_article_show', methods: ['GET'])]
    public function show(Article $article): Response
    {
        return $this->render('article/show.html.twig', [
            'article' => $article,
        ]);
    }

//     #[Route('/{id}/edit', name: 'app_article_edit', methods: ['GET', 'POST'])]
//     public function edit(Request $request, Article $article, ArticleRepository $articleRepository): Response
//     {
//         $form = $this->createForm(Article1Type::class, $article);
//         $form->handleRequest($request);

//         if ($form->isSubmitted() && $form->isValid()) {
//             $articleRepository->save($article, true);

//             return $this->redirectToRoute('app_article_index', [], Response::HTTP_SEE_OTHER);
//         }

//         return $this->renderForm('article/edit.html.twig', [
//             'article' => $article,
//             'form' => $form,
//         ]);
//     }

//     #[Route('/{id}', name: 'app_article_delete', methods: ['POST'])]
//     public function delete(Request $request, Article $article, ArticleRepository $articleRepository): Response
//     {
//         if ($this->isCsrfTokenValid('delete'.$article->getId(), $request->request->get('_token'))) {
//             $articleRepository->remove($article, true);
//         }

//         return $this->redirectToRoute('app_article_index', [], Response::HTTP_SEE_OTHER);
//     }


#[Route('/article', name: 'show_article', methods: ['GET', 'POST'])]
public function showmore($id, ArticleRepository $articles): Response
{
    // Affiche la note demandée dans le template dédié
    return $this->render('partials/_lastarticles.html.twig', [
        // Récupère la note demandée par son id
        'oneArticle' => $articles->findOneBy(
            ['id' => $id]
        ),
        'article' => $articles->findBy(
            [],
            ['id' => 'DESC'],
            6)
    ]);
}
}
