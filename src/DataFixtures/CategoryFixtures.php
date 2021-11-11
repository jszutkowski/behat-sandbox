<?php
declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $categories = ['Books', 'Sport'];

        foreach ($categories as $categoryName) {
            $category = (new Category())->setName($categoryName);
            $manager->persist($category);
            $manager->flush();

            $this->addReference(sprintf('category-%s', $categoryName), $category);
        }
    }
}
