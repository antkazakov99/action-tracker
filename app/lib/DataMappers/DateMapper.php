<?php

namespace Ant\Tracker\DataMappers;

include_once '../autoload.php';

use Ant\Tracker\Entities\Date;

class DateMapper extends DataMapper
{
    /**
     * @param int $id
     * @return Date|null
     */
    public function getById(int $id): ?Date
    {
        $query = 'SELECT Dates.id, Dates.date, Dates.dateType FROM Dates WHERE Dates.id = :id';
        $queryResult = $this->select($query, ['id' => $id])[0];
        return $queryResult ? $this->registry->getDateFactory()->createObject($queryResult) : null;
    }

    /**
     * @param int $year
     * @param int $month
     * @return array<Date>
     */
    public function getByMonth(int $year, int $month): array
    {
        $query = 'SELECT Dates.id, Dates.date, Dates.dateType FROM Dates WHERE YEAR(Dates.date) = :year AND MONTH(Dates.date) = :month';
        $queryResult = $this->select($query, ['year' => $year, 'month' => $month]);
        $dates = [];
        foreach ($queryResult as $row)
        {
            $dates[] = $this->registry->getDateFactory()->createObject($row);
        }
        return $dates;
    }

    /**
     * @return array<Date>
     */
    public function getAll(): array
    {
        $query = 'SELECT Dates.id, Dates.date, Dates.dateType FROM Dates';
        $queryResult = $this->select($query);
        $dates = [];
        foreach ($queryResult as $row)
        {
            $dates[] = $this->registry->getDateFactory()->createObject($row);
        }
        return $dates;
    }

    /**
     * @param Date $date
     * @return void
     */
    public function add(Date $date): void
    {
        $query = 'INSERT INTO Dates (date, dateType) VALUE (:date, :dateType)';
        $this->edit($query, [
            'date' => $date->getDate(),
            'dateType' => $date->getDateType()->value
        ]);
    }
}