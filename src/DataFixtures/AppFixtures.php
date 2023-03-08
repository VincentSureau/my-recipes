<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Recipe;
use App\Entity\Season;
use DateTimeImmutable;
use App\Entity\Ingredient;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create('fr_FR');

        for($i = 0; $i < 10; $i++)
        {
            $user = new User;
            $user
                ->setUsername($faker->firstName() . '_' . $faker->lastName())
                ->setAvatar($faker->imageUrl(640, 480, 'person', true))
                ->setEmail($faker->safeEmail())
                ->setPassword($faker->sha256())
                ->setIsSubscribed($faker->boolean())
                ->setRoles(['ROLE_USER'])
            ;
    
            $manager->persist($user);
        }

        $ingredients=[];
        for($i = 0; $i < 10; $i++)
        {
            $ingredient = new Ingredient;
            $ingredient
            
                ->setType($faker->randomElement(['fruit', 'légume']))
                ->setDescription($faker->text())
                ->setImage($faker->imageUrl(640, 480, 'food', true))
                ->setName($faker->word())
            ;
            $manager->persist($ingredient);
            $ingredients[]=$ingredient; 
        }

        
        $summerStart = new \DateTimeImmutable('2023-06-21');
        $fallStart = new \DateTimeImmutable('2023-09-23');
        $springStart = new \DateTimeImmutable('2023-03-20');
        $winterStart = new \DateTimeImmutable('2023-12-21');

        $summer = new Season;
        $summer
            ->setName('Summer')
            ->setStartAt($summerStart)
            ->setEndAt($fallStart)
        ;   
        $manager->persist($summer);
        
        $spring = new Season;
        $spring
            ->setName('Spring')
            ->setStartAt($springStart)
            ->setEndAt($summerStart)
        ;
        $manager->persist($spring);
        
        $winter = new Season;
        $winter
            ->setName('Winter')
            ->setStartAt($winterStart)
            ->setEndAt($springStart)
        ;
        $manager->persist($winter);
        
        $fall = new Season;
        $fall
            ->setName('Fall')
            ->setStartAt($fallStart)
            ->setEndAt($winterStart)
        ;
        $manager->persist($fall);

        $seasons = [$summer,$spring,$winter,$fall];

        for($i = 0; $i < 10; $i++ ) // recipe
        {
            $recipe= new Recipe();
            $recipe
                ->setName($faker->words(10, true))
                ->setDescription($faker->text())
                ->setLevel($faker->numberBetween(1,3))
                ->setImage($faker->imageUrl(640, 480, 'recipe', true))
                ->addSeason($faker->randomElement($seasons))
            ;
            $manager->persist($recipe);
            $recipes[] = $recipe;
        }

        $manager->flush();
    }
}
