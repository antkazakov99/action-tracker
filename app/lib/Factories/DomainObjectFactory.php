<?php

namespace Ant\Tracker\Factories;

use Ant\Tracker\Entities\DomainObject;

abstract class DomainObjectFactory
{
    abstract public function createObject(array $row): DomainObject;
}