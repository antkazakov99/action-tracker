<?php

namespace Ant\Tracker\DataMappers;

include_once '../autoload.php';

use Ant\Tracker\Entities\Action;

class ActionMapper extends DataMapper
{
    public function getById(int $id): Action
    {
        $query = 'SELECT Actions.id, Actions.taskUrl, Actions.date, Actions.startTime, Actions.endTime FROM Actions WHERE Actions.id = :id';
        $queryResult = $this->select($query, ['id' => $id])[0];
        return new Action($queryResult['id'], $queryResult['taskUrl'], $queryResult['date'], $queryResult['startTime'], $queryResult['endTime']);
    }
    public function getByMonth(int $year, int $month): array
    {
        $query = 'SELECT Actions.id, Actions.taskUrl, Actions.date, Actions.startTime, Actions.endTime FROM Actions WHERE YEAR(Actions.date) = :year AND MONTH(Actions.date) = :month';
        $queryResult = $this->select($query, ['year' => $year, 'month' => $month]);
        $actions = [];
        foreach ($queryResult as $row)
        {
            $actions[] = new Action($row['id'], $row['taskUrl'], $row['date'], $row['startTime'], $row['endTime']);
        }
        return $actions;
    }
    public function getAll(): array
    {
        $query = 'SELECT Actions.id, Actions.taskUrl, Actions.date, Actions.startTime, Actions.endTime FROM Actions';
        $queryResult = $this->select($query);
        $actions = [];
        foreach ($queryResult as $row)
        {
            $actions[] = new Action($row['id'], $row['taskUrl'], $row['date'], $row['startTime'], $row['endTime']);
        }
        return $actions;
    }
    public function add(Action $action): void
    {
        $query = 'INSERT INTO Actions (taskUrl, date, startTime, endTime) VALUE (:taskUrl, :date, :startTime, :endTime)';
        $this->edit($query, [
            'taskUrl' => $action->getTaskUrl(),
            'date' => $action->getDate(),
            'startTime' => $action->getStartTime(),
            'endTime' => $action->getEndTime()
        ]);
    }
}