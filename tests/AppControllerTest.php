<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AppControllerTest extends WebTestCase
{
    public function testAppIsLive()
    {
        $client = static::createClient();
        $client->request('GET', '/app');

        $this->assertResponseIsSuccessful();
    }

    public function testPackageMatches()
    {
        $client = static::createClient();
        $client->request('GET', '/api/packages/foo/bar/');

        $this->assertResponseIsSuccessful();
    }

    public function testPackageWithLongNameMatches()
    {
        $client = static::createClient();
        $client->request('GET', '/api/packages/fooooooooooooooooooooo/bar/');

        $this->assertResponseIsSuccessful();
    }

    public function testPackageDependentsMatches()
    {
        $client = static::createClient();
        $client->request('GET', '/api/packages/foo/bar/dependents/');

        $this->assertResponseIsSuccessful();
    }

    public function testPackageDependentsWithLongNameMatches()
    {
        $client = static::createClient();
        $client->request('GET', '/api/packages/fooooooooooooooooooooo/bar/dependents/');

        $this->assertResponseIsSuccessful();
    }

    public function testPackageV2WithLongNameMatches()
    {
        $client = static::createClient();
        $client->request('GET', '/api/packages/fooooooooooooooooooooo/bar/');

        $this->assertResponseIsSuccessful();
    }

    public function testPackageDependentsV2WithLongNameMatches()
    {
        $client = static::createClient();
        $client->request('GET', '/api/v2/packages/fooooooooooooooooooooo/bar/dependents/');

        $this->assertResponseIsSuccessful();
    }
}
