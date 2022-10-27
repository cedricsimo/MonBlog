<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Article;

class ArticleFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        for ($i=1;$i<=10;$i++){
            $article = new Article();
            $article->setTitle ("Titre de l'article n°$i")
                    ->setContent ( "<p>Contenu de l'article n°$i</p>")
                    ->setImage ("https://image.shutterstock.com/image-photo/kiev-ukraine-may-30-2016-260nw-428643526.jpg")
                    ->setCreatedAt (new \DateTimeImmutable())
                    ;
                    $manager->persist($article);
        }

        $manager->flush();
    }
}
