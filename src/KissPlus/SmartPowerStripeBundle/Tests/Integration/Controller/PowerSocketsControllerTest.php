<?php
namespace KissPlus\SmartPowerStripeBundle\Tests\Integration\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PowerSocketsControllerTest extends WebTestCase
{
    public function testGetSockets()
    {
        $client = static::createClient();
        $client->request('GET', '/sockets');
        $content = $client
            ->getResponse()
            ->getContent();
        $this->assertNotEmpty(
            $content
        );
    }
}
