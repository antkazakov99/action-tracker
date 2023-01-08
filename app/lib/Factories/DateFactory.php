<?php

namespace Ant\Tracker\Factories;

use Ant\Tracker\DateType;
use Ant\Tracker\Entities\Date;

class DateFactory extends DomainObjectFactory
{
    /**
     * @param array{id: int, date: string, dateType: int} $row
     * @return Date
     */
    public function createObject(array $row): Date
    {
        return new Date($row['id'], $row['date'], DateType::from($row['dateType']));
    }
} 