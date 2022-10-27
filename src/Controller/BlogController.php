<?php
namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


use App\Entity\Article;
use App\Repository\ArticleRepository;


class BlogController extends AbstractController
{
    private $entityManager;

    public function __construc(EntityManagerInterface $entityManager){

        return $this->entityManager = $entityManager;
    }
    
    #[Route('/blog', name: 'app_blog')]
    public function index(): Response
    {
         $repo = $this->entityManager->getRepository(Article::class);

         $articles = $repo->findAll();

        return $this->render('blog/index.html.twig', [
           
            'articles' => $articles,
        ]);
    }
    #[Route('/', name: 'home')]
    public function home(): Response
    {
        return $this->render('blog/home.html.twig');
    }
    #[Route('/blog/12', name: 'blog_show')]
    public function show(): Response
    {
        return $this->render('blog/show.html.twig');
    }

}
