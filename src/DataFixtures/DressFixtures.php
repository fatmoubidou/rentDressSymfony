<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Category;
use App\Entity\Dress;
use Faker;


class DressFixtures extends Fixture
{
    private $categories;
    private $prices = [0 => 59, 1 => 45.00, 2 => 24.90, 3 => 13.49, 4 => 99];
    private $sizes = [0 => 'XS', 1 => 'S', 2 => 'M', 3 => 'L', 4 => 'XL'];

    public function load(ObjectManager $manager)
    {
        // create 5 categories! Bam!
        for ($i = 0; $i < 5; $i++) {
            $category = new Category();
            $category->setName('Categorie'.$i);
            $manager->persist($category);
            $this->categories[] = $category; //tab categories
        }


        // On configure dans quelles langues nous voulons nos données
        $faker = Faker\Factory::create('fr_FR');

        for ($i=0; $i < 9; $i++) {
          $dress = new Dress();
          $dress->setTitle('Robe n°'.$i);
          $dress->setPrice($this->prices[rand(0, count($this->prices)-1)]);
          $dress->setSize($this->sizes[rand(0, count($this->sizes)-1)]);
          $dress->setContent($faker->text);
          $dress->setImage('http://placehold.it/350x150');
          $dress->setCategory($this->categories[rand(0, count($this->categories)-1)]); //choix aleatoire de la categorie
          $manager->persist($dress);
        }

        $manager->flush();
    }
}
