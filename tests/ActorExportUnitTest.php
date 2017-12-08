<?php

namespace App\Tests;

use App\Controller\ActorController;
use App\Repository\ActorRepository;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\JsonResponse;

class ActorExportUnitTest extends KernelTestCase
{
    /** @var ActorController */
    private $ctrl;

    protected function setUp()
    {
        $this->ctrl = new ActorController();
        //$this->createKernel()->getContainer();
    }

    public function testSomething()
    {
        // Arrange
        $containerStub = $this->createMock(Container::class);
        $containerStub->method('has')->willReturn(false);
        $this->ctrl->setContainer($containerStub);

        $repoStub = $this->createMock(ActorRepository::class);
        $repoStub->method('findAll')->willReturn([]);

        // Act
        $response = $this->ctrl->export($repoStub);

        // Assert
        $this->assertInstanceOf(JsonResponse::class, $response);

        $data = json_decode($response->getContent());
        $this->assertInternalType('array', $data);
    }
}
