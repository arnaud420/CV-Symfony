<?php
namespace AppBundle\DataFixtures;

use AppBundle\Entity\Category;
use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $blog = new Category();
        $blog->setName('Blog');
        $manager->persist($blog);

        $portfolio = new Category();
        $portfolio->setName('Portfolio');
        $manager->persist($portfolio);

        $admin = new User();
        $admin->setEmail('admin@admin.fr');
        $admin->setUsername('admin');
        $admin->setPassword('admin');
        $admin->setRoles(['ROLE_SUPER_ADMIN']);
        $manager->persist($admin);

        $user = new User();
        $user->setEmail('toto@email.fr');
        $user->setUsername('toto');
        $user->setPassword('toto');
        $manager->persist($user);

        $manager->flush();
    }
}