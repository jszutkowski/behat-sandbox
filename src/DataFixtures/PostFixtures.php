<?php
declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PostFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $posts = [
            ['First example post', 'First post example content', 'Books', 'admin@admin']
        ];

        foreach ($posts as [$title, $content, $categoryName, $userEmail]) {
            $post = (new Post())
                ->setTitle($title)
                ->setContent($content)
                ->setCategory($this->getReference(sprintf('category-%s', $categoryName)))
                ->setAuthor($this->getReference(sprintf('user-%s', $userEmail)));

            $manager->persist($post);
            $manager->flush();
        }
    }

    public function getDependencies(): array
    {
        return [CategoryFixtures::class, UserFixtures::class];
    }
}
