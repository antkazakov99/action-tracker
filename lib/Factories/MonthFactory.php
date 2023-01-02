<?php

namespace Ant\Tracker\Factories;

use Ant\Tracker\ApplicationHelper;
use Ant\Tracker\Entities\Month;
use Ant\Tracker\Registry;

include_once '../autoload.php';

class MonthFactory extends AbstractFactory
{
    /**
     * @param array $row
     * @return Month
     */
    public function createObject(array $row): Month
    {
        $dates = ApplicationHelper::getDatesByMonth($row['year'], $row['month']);
        return new Month($row['id'], $row['year'], $row['month'], $row['salary'], $row['targetHours'], $row['avgSalary'], $dates);
    }
}