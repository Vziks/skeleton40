<?php

namespace App\Tests\Admin;

use Liip\FunctionalTestBundle\Test\WebTestCase;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use App\DataFixtures\ORM\LoadAdminDataFixture as FixtureAdmin;

/**
 * Class AdminFunctionalTest.
 * Project skeleton4.
 *
 * @author Anton Prokhorov
 */
class AdminFunctionalTest extends WebTestCase
{
    protected static $wasSetup = false;

    protected function setUp()
    {
        parent::setUp();

        if (false === static::$wasSetup) {
            $this->loadFixtures([
                FixtureAdmin::class,
            ]);

            static::$wasSetup = true;
        }
    }

    /**
     * @return KernelBrowser
     */
    public function testAdminLogin()
    {
        $kernelBrowser = static::createClient();

        $crawler = $kernelBrowser->request('GET', '/admin/login');

        $form = $crawler->filter('button[type="submit"]')->form();

        $fakeAdmin = FixtureAdmin::getFakeAdmin();

        $form['_username'] = $fakeAdmin->getUsername();
        $form['_password'] = $fakeAdmin->getPlainPassword();

        $kernelBrowser->submit($form);

        $this->assertTrue($kernelBrowser->getResponse()->isRedirect());
        $kernelBrowser->followRedirect();

        $kernelBrowser->request('GET', '/admin/dashboard');

        $this->assertEquals(200, $kernelBrowser->getResponse()->getStatusCode());

        return $kernelBrowser;
    }

    /**
     * @depends      testAdminLogin
     * @dataProvider menuItemsListProvider
     *
     * @param               $link
     * @param KernelBrowser $kernelBrowser
     */
    public function testMenuItemList($link, KernelBrowser $kernelBrowser)
    {
        $kernelBrowser->request('GET', $link);

        $this->assertEquals(200, $kernelBrowser->getResponse()->getStatusCode());
    }

    /**
     * @depends      testAdminLogin
     * @dataProvider menuItemsCreateProvider
     *
     * @param $link
     * @param KernelBrowser $kernelBrowser
     */
    public function testMenuItemCreate($link, KernelBrowser $kernelBrowser)
    {
        $kernelBrowser->request('GET', $link);

        $this->assertEquals(200, $kernelBrowser->getResponse()->getStatusCode());
    }

    /**
     * @depends testAdminLogin
     *
     * @param KernelBrowser $kernelBrowser
     */
    public function testAdminLogout(KernelBrowser $kernelBrowser)
    {
        $kernelBrowser->request('GET', '/admin/logout');
        $this->assertTrue($kernelBrowser->getResponse()->isRedirect());
        $kernelBrowser->followRedirect();

        $kernelBrowser->request('GET', '/admin/dashboard');
        $this->assertTrue($kernelBrowser->getResponse()->isRedirect());
    }

    /**
     * @return array
     */
    public function menuItemsCreateProvider()
    {
        return [
            ['/admin/sonata/user/user/create'],
            ['/admin/sonata/user/group/create'],
            ['/admin/sonata/media/media/create?context=default&category=1&hide_context=0'],
            ['/admin/sonata/media/gallery/create?context=default'],
            ['/admin/adw/seo/redirectrule/create'],
            ['/admin/adw/seo/rule/create'],
            ['/robots/edit'],
        ];
    }

    /**
     * @return array
     */
    public function menuItemsListProvider()
    {
        return [
            ['/admin/sonata/user/user/list'],
            ['/admin/sonata/user/group/list'],
            ['/admin/sonata/media/media/list'],
            ['/admin/sonata/media/gallery/list'],
            ['/admin/adw/seo/redirectrule/list'],
            ['/admin/adw/seo/rule/list'],
        ];
    }
}
