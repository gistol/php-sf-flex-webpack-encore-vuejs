<?php

namespace App\Tests\Controller;

use App\Tests\Common\PantherToolsAbstract;

class DefaultControllerTest extends PantherToolsAbstract
{
    /**
     * @group git-pre-push
     */
    public function testBasicController()
    {
        $client = static::createPantherClient(); // Your app is automatically started using the built-in web server
        $crawler = $client->request('GET', $this->getRouter()->generate('index'));

        $this->assertContains('Demo of symfony 4 with flex, and webpack/encore, VueJS, ApiPlatform, HttpPlug,...', $crawler->filter('nav h1')->text()); // You can use any PHPUnit assertion

        $links = $crawler->filter('ul li.list-group-item a');
        $this->assertCount(17, $links);

        $h2 = $crawler->filter('h2');
        $this->assertEquals('List of demos', $h2->first()->text());
    }
}