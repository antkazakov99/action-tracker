<?php

namespace Ant\Tracker\Entities;

abstract class DomainObject implements \JsonSerializable {
    /**
     * Возвращает параметры объекта в виде массива
     * @return array
     */
    abstract public function toArray(): array;
}