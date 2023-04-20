<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 1; $i < 50; $i++) {
            // Ajoute des articles à la base de données
            $article = new Article();
            $article->setTitre('Article ' . $i)
                ->setContent("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.")
                ->setAuthor('Martin Dubois')
                ->setDate(new \DateTime('now'));

                $manager->persist($article);

                // Nettoyer la file d'attente
                $manager->flush();
        }
        
    }
}
