<?php

namespace Ant\Tracker\DataMappers;

include_once '../autoload.php';

use Ant\Tracker\Entities\Month;

class MonthMapper extends DataMapper
{
    public function getById(int $id): Month
    {
        $query = 'SELECT Months.id, Months.year, Months.month, Months.salary, Months.targetHours, Months.avgSalary FROM Months WHERE Months.id = :id';
        $queryResult = $this->select($query, ['id' => $id])[0];
        return new Month(
            $queryResult['id'],
            $queryResult['year'],
            $queryResult['month'],
            $queryResult['salary'],
            $queryResult['targetHours'],
            $queryResult['avgSalary']
        );
    }
    public function getAll(): array
    {
        $query = 'SELECT Months.id, Months.year, Months.month, Months.salary, Months.targetHours, Months.avgSalary FROM Months';
        $queryResult = $this->select($query);
        $months = [];
        foreach ($queryResult as $row)
        {
            $months[] = new Month(
                $row['id'],
                $row['year'],
                $row['month'],
                $row['salary'],
                $row['targetHours'],
                $row['avgSalary']
            );
        }
        return $months;
    }
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