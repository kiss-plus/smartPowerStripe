<?php
namespace KissPlus\SmartPowerStripeBundle\Tests\Integration\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

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

    public function testGetNotFound()
    {
        $client = static::createClient();
        $client->request('GET', '/not-exists');
        $this->assertSame(Response::HTTP_NOT_FOUND, $client->getResponse()->getStatusCode());
    }
}
