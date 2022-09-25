<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Articles;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use DateTimeImmutable;

class AppFixtures extends Fixture
{
    public function __construct(){
        $this->faker = Factory::create('fr_FR');
    }
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        for ($i = 0; $i < 20; $i++) {
            $user = new User();
            
            $article = new Articles();
            $article->setArticle($this->faker->text());
            $article->setCreatedAt(DateTimeImmutable::createFromMutable($this->faker->datetime()));
            // $article->setUser($);:

            $manager->persist($article);
            $manager->flush();

        }

        $manager->flush();
    }
}
