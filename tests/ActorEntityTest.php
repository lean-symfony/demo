<?php

namespace App\Tests;

use App\Entity\Actor;
use PHPUnit\Framework\TestCase;

class ActorEntityTest extends TestCase
{
    public function testIsJsonSerializable()
    {
        $entity = new Actor();
        $this->assertInstanceOf(\JsonSerializable::class, $entity);
    }
}
