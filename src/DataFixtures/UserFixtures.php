<?php
declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $users = [['admin@admin', 'admin1']];

        foreach ($users as [$email, $password]) {
            $user = (new User())
                ->setEmail($email)
                ->setIsVerified(true)
                ->setPassword($password)
                ->setRoles(['ROLE_ADMIN']);

            $manager->persist($user);
            $manager->flush();

            $this->addReference(sprintf('user-%s', $email), $user);
        }
    }
}
