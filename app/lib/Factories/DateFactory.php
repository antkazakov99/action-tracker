<?php

namespace Ant\Tracker\Factories;

use Ant\Tracker\DateType;
use Ant\Tracker\Entities\Date;

include_once '../autoload.php';

class DateFactory extends AbstractFactory
{
    /**
     * @param array $row
     * @return Date
     */
    public function createObject(array $row): Date
    {
        $actions = $this->registry->getActionMapper()->getByDate($row['date']);
        return new Date($row['id'], $row['date'], DateType::from($row['dateType']), $actions);
    }
} 