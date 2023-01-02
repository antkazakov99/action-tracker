<?php

namespace Ant\Tracker\DataMappers;

include_once '../autoload.php';

use Ant\Tracker\Entities\Month;

class MonthMapper extends DataMapper
{
    /**
     * @param int $id
     * @return Month|null
     */
    public function getById(int $id): ?Month
    {
        $query = 'SELECT Months.id, Months.year, Months.month, Months.salary, Months.targetHours, Months.avgSalary FROM Months WHERE Months.id = :id';
        $queryResult = $this->select($query, ['id' => $id])[0];
        return $queryResult ? $this->registry->getMonthFactory()->createObject($queryResult) : null;
    }

    /**
     * @param int $year
     * @param int $month
     * @return Month|null
     */
    public function get(int $year, int $month): ?Month
    {
        $query = 'SELECT Months.id, Months.year, Months.month, Months.salary, Months.targetHours, Months.avgSalary FROM Months WHERE Months.year = :year AND Months.month = :month';
        $queryResult = $this->select($query, ['year' => $year, 'month' => $month])[0];
        return $queryResult ? $this->registry->getMonthFactory()->createObject($queryResult) : null;
    }

    /**
     * @return array<Month>
     */
    public function getAll(): array
    {
        $query = 'SELECT Months.id, Months.year, Months.month, Months.salary, Months.targetHours, Months.avgSalary FROM Months';
        $queryResult = $this->select($query);
        $months = [];
        foreach ($queryResult as $row)
        {
            $this->registry->getMonthFactory()->createObject($row);
        }
        return $months;
    }

    /**
     * @param Month $month
     * @return void
     */
    public function add(Month $month): void
    {
        $query = 'INSERT INTO Months (year, month, salary, targetHours, avgSalary) VALUE (:year, :month, :salary, :targetHours, :avgSalary)';
        $this->edit($query, [
            'year' => $month->getYear(),
            'month' => $month->getMonth(),
            'salary' => $month->getSalary(),
            'targetHours' => $month->getTargetHours(),
            'avgSalary' => $month->getAvgSalary()
        ]);
    }
}