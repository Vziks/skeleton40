<?php

namespace App\DataFixtures\ORM;

use App\Entity\Article;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class LoadArticleDataFixture
 * Project skeleton40.
 *
 * @author Anton Prokhorov
 */
class LoadArticleDataFixture extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * {@inheritdoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $manager->clear();

        for ($i = 0; $i < 20; ++$i) {
            $article = new Article();

            $article
                ->setTitle('Title'.$i)
                ->setContent('Content '.$i.' '.uniqid('Content_'))
                ->setPreview('Preview '.$i.' '.uniqid('Preview_'));

            $manager->persist($article);
        }

        $manager->flush();
    }

    /**
     * Get the order of this fixture.
     *
     * @return int
     */
    public function getOrder()
    {
        return 1;
    }
}
