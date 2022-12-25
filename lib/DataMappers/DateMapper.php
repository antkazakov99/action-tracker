<?php

namespace Ant\Tracker\DataMappers;

include_once '../autoload.php';

use Ant\Tracker\Entities\Date;
use Ant\Tracker\Entities\DateType;
use Bitrix\Main\DB\SqlException;
use Bitrix\Main\SystemException;

class DateMapper extends DataMapper
{
    public function getById(int $id): Date
    {
        $query = 'SELECT Dates.id, Dates.date, Dates.dateType FROM Dates WHERE Dates.id = :id';
        $queryResult = $this->select($query, ['id' => $id])[0];
        return new Date(
            $queryResult['id'],
            $queryResult['date'],
            DateType::from($queryResult['dateType'])
        );
    }
    public function getAll(): array
    {
        $query = 'SELECT Dates.id, Dates.date, Dates.dateType FROM Dates';
        $queryResult = $this->select($query);
        $dates = [];
        foreach ($queryResult as $row)
        {
            $dates[] = new Date(
                $row['id'],
                $row['date'],
                DateType::from($row['dateType'])
            );
        }
        return $dates;
    }
    public function add(Date $date): void
    {
        var_dump($date->getDateType()->value);
        $query = 'INSERT INTO Dates (date, dateType) VALUE (:date, :dateType)';
        $this->edit($query, [
            'date' => $date->getDate(),
            'dateType' => $date->getDateType()->value
        ]);
    }
}