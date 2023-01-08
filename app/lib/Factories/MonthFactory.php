<?php

namespace Ant\Tracker\Factories;

use Ant\Tracker\Entities\Month;

class MonthFactory
{
    /**
     * @param array{id: int|null, year: int, month: int, salary: int, targetHours: int, avgSalary: int} $row
     * @return Month
     */
    public function createObject(array $row): Month
    {
        return new Month($row['id'], $row['year'], $row['month'], $row['salary'], $row['targetHours'], $row['avgSalary']);
    }
}