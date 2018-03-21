<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
//        $this->assertEquals('deny', $client->getResponse()->headers->get('X-Frame-Options'), '', 0.0, 10, false, true);
//        $this->assertEquals('nosniff', $client->getResponse()->headers->get('X-Content-Type-Options'), '', 0.0, 10, false, true);

        $this->assertContains('Welcome to Symfony', $crawler->filter('#container h1')->text());
    }

    public function testApiDocIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/api/doc');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('API documentation', $crawler->filter('#header h1')->text());
    }
    /**
     * @group production
     */
    public function testFaviconIsExists()
    {
        static::bootKernel();

        $kernelRootDir = static::$kernel
            ->getContainer()
            ->get('kernel')
            ->getRootDir();

        $this->assertFileExists($kernelRootDir . '/../web/favicon.ico');
    }

    /**
     * @group production
     */
    public function test404()
    {
        $client = static::createClient();

        $client->request('GET', sprintf('/porno-hardcore/%s', uniqid()));

        $this->assertTrue($client->getResponse()->isNotFound());
    }

}
