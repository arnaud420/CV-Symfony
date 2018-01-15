<?php
namespace AppBundle\DataFixtures;

use AppBundle\Entity\Category;
use AppBundle\Entity\Comment;
use AppBundle\Entity\Image;
use AppBundle\Entity\Post;
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

        for ($i = 1; $i < 11; $i++) {
            $post_blog = new Post();
            $post_blog->setTitle('Article '.$i);
            $post_blog->setContent(
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus non elit hendrerit, consectetur quam a, blandit ante. Nullam varius, massa vel scelerisque mattis, nunc urna sollicitudin lacus, nec finibus ipsum enim a libero. Curabitur ultrices consequat est, quis tristique quam sodales non. Ut ultrices est eget fringilla accumsan. Praesent semper quis arcu vitae rutrum. Aliquam bibendum pellentesque metus, et tincidunt lectus. Morbi sit amet ultricies sapien, eu efficitur nunc. Quisque convallis lobortis tincidunt.

Quisque eu dictum quam, ut maximus lacus. Aenean in elementum risus. Sed mattis elit fringilla ante sagittis condimentum. Ut vitae velit sodales, dictum est sit amet, faucibus nibh. Praesent quis quam non turpis elementum mollis non sit amet sem. Phasellus dolor massa, pharetra vel ornare in, bibendum non eros. Etiam eu eleifend felis. Cras leo mauris, dictum a nulla feugiat, volutpat gravida ligula. Duis leo erat, facilisis sed lobortis id, tincidunt et quam. Praesent sit amet massa sodales, finibus diam nec, pellentesque quam. Vivamus est erat, dapibus eget eleifend sit amet, sollicitudin sed arcu. Donec vel velit vel mi pretium facilisis. Etiam id lorem nibh. Duis enim neque, feugiat et est sed, cursus gravida elit. Morbi at nibh scelerisque, condimentum odio at, iaculis libero.

Nulla fermentum turpis in tortor dictum, ut tincidunt tellus hendrerit. Nam placerat luctus sapien, at sollicitudin augue faucibus eu. Sed rutrum diam metus, elementum semper metus efficitur non. Ut commodo, nulla varius iaculis sagittis, turpis diam aliquet felis, ut accumsan turpis ex sit amet felis. Vestibulum tempor laoreet vehicula. Quisque fermentum id nunc quis mollis. Nunc sed urna sed justo bibendum vulputate sit amet eget erat. Suspendisse potenti. Nulla venenatis dui eu magna mollis, lobortis vulputate ex vulputate.

Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce gravida et dolor eget consequat. Pellentesque ultrices laoreet est at maximus. Maecenas leo metus, convallis faucibus hendrerit sed, dignissim eu elit. Curabitur vel facilisis dolor, id pretium eros. Vestibulum ac erat sapien. Curabitur elit ante, eleifend sed mi at, euismod euismod justo.

Sed viverra erat quis urna fermentum mollis. Praesent sodales eros sem, quis tincidunt tellus dapibus quis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque laoreet augue vel faucibus rutrum. Sed gravida sem egestas orci eleifend hendrerit. Curabitur venenatis accumsan ex a facilisis. Integer sit amet consectetur dolor, vel molestie nisi. Fusce dictum, magna a imperdiet lacinia, risus tortor hendrerit tellus, eget lacinia lorem augue nec mauris. In rhoncus lacus vitae blandit accumsan. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent dictum ex vel lorem molestie porta. Nulla imperdiet ex nunc, eget pharetra erat faucibus a. Donec tristique placerat erat. In in tortor a tortor ullamcorper auctor. Vivamus ut erat consequat, tristique neque ac, accumsan diam.'
            );
            $post_blog->setCategory($blog);

            $image_blog1 = new Image();
            $image_blog1->setName('sympozium_ordi.jpg');
            $image_blog1->setPost($post_blog);

            $image_blog2 = new Image();
            $image_blog2->setName('abiflizera.jpg');
            $image_blog2->setPost($post_blog);

            for ($j = 1; $j < 5; $j++)
            {
                $blog_comment = new Comment();
                $blog_comment
                    ->setName('toto' . $j)
                    ->setEmail('toto@toto.fr')
                    ->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit. In id dui sed magna mattis bibendum in sit amet libero. Integer luctus metus non nisl condimentum dictum. Ut non feugiat mi. In rutrum tincidunt nibh, in hendrerit sapien condimentum at. Sed mollis urna eget tellus iaculis, in iaculis ante suscipit. Donec auctor convallis augue id pellentesque. Integer lectus ante, tincidunt venenatis sollicitudin et, lacinia fermentum lectus.')
                    ->setPost($post_blog);
                $manager->persist($blog_comment);
            }

            $manager->persist($post_blog);
            $manager->persist($image_blog1);
            $manager->persist($image_blog2);
        }

        for ($i = 1; $i < 11; $i++) {
            $post_portfolio = new Post();
            $post_portfolio->setTitle('Projet '.$i);
            $post_portfolio->setContent(
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus non elit hendrerit, consectetur quam a, blandit ante. Nullam varius, massa vel scelerisque mattis, nunc urna sollicitudin lacus, nec finibus ipsum enim a libero. Curabitur ultrices consequat est, quis tristique quam sodales non. Ut ultrices est eget fringilla accumsan. Praesent semper quis arcu vitae rutrum. Aliquam bibendum pellentesque metus, et tincidunt lectus. Morbi sit amet ultricies sapien, eu efficitur nunc. Quisque convallis lobortis tincidunt.

Quisque eu dictum quam, ut maximus lacus. Aenean in elementum risus. Sed mattis elit fringilla ante sagittis condimentum. Ut vitae velit sodales, dictum est sit amet, faucibus nibh. Praesent quis quam non turpis elementum mollis non sit amet sem. Phasellus dolor massa, pharetra vel ornare in, bibendum non eros. Etiam eu eleifend felis. Cras leo mauris, dictum a nulla feugiat, volutpat gravida ligula. Duis leo erat, facilisis sed lobortis id, tincidunt et quam. Praesent sit amet massa sodales, finibus diam nec, pellentesque quam. Vivamus est erat, dapibus eget eleifend sit amet, sollicitudin sed arcu. Donec vel velit vel mi pretium facilisis. Etiam id lorem nibh. Duis enim neque, feugiat et est sed, cursus gravida elit. Morbi at nibh scelerisque, condimentum odio at, iaculis libero.

Nulla fermentum turpis in tortor dictum, ut tincidunt tellus hendrerit. Nam placerat luctus sapien, at sollicitudin augue faucibus eu. Sed rutrum diam metus, elementum semper metus efficitur non. Ut commodo, nulla varius iaculis sagittis, turpis diam aliquet felis, ut accumsan turpis ex sit amet felis. Vestibulum tempor laoreet vehicula. Quisque fermentum id nunc quis mollis. Nunc sed urna sed justo bibendum vulputate sit amet eget erat. Suspendisse potenti. Nulla venenatis dui eu magna mollis, lobortis vulputate ex vulputate.

Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce gravida et dolor eget consequat. Pellentesque ultrices laoreet est at maximus. Maecenas leo metus, convallis faucibus hendrerit sed, dignissim eu elit. Curabitur vel facilisis dolor, id pretium eros. Vestibulum ac erat sapien. Curabitur elit ante, eleifend sed mi at, euismod euismod justo.

Sed viverra erat quis urna fermentum mollis. Praesent sodales eros sem, quis tincidunt tellus dapibus quis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque laoreet augue vel faucibus rutrum. Sed gravida sem egestas orci eleifend hendrerit. Curabitur venenatis accumsan ex a facilisis. Integer sit amet consectetur dolor, vel molestie nisi. Fusce dictum, magna a imperdiet lacinia, risus tortor hendrerit tellus, eget lacinia lorem augue nec mauris. In rhoncus lacus vitae blandit accumsan. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent dictum ex vel lorem molestie porta. Nulla imperdiet ex nunc, eget pharetra erat faucibus a. Donec tristique placerat erat. In in tortor a tortor ullamcorper auctor. Vivamus ut erat consequat, tristique neque ac, accumsan diam.'
            );
            $post_portfolio->setCategory($portfolio);

            $image_portfolio1 = new Image();
            $image_portfolio1->setName('creacut01.jpg');
            $image_portfolio1->setPost($post_portfolio);

            $image_portfolio2 = new Image();
            $image_portfolio2->setName('sympozium_port.png');
            $image_portfolio2->setPost($post_portfolio);

            for ($j = 1; $j < 5; $j++)
            {
                $portfolio_comment = new Comment();
                $portfolio_comment
                    ->setName('toto' . $j)
                    ->setEmail('toto@toto.fr')
                    ->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit. In id dui sed magna mattis bibendum in sit amet libero. Integer luctus metus non nisl condimentum dictum. Ut non feugiat mi. In rutrum tincidunt nibh, in hendrerit sapien condimentum at. Sed mollis urna eget tellus iaculis, in iaculis ante suscipit. Donec auctor convallis augue id pellentesque. Integer lectus ante, tincidunt venenatis sollicitudin et, lacinia fermentum lectus.')
                    ->setPost($post_portfolio);
                $manager->persist($portfolio_comment);
            }

            $manager->persist($post_portfolio);
            $manager->persist($image_portfolio1);
            $manager->persist($image_portfolio2);
        }

        $user = new User();
        $user->setEmail('toto@email.fr');
        $user->setUsername('toto');
        $user->setPassword('toto');
        $manager->persist($user);

        $manager->flush();
    }
}