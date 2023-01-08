<?php

namespace Ant\Tracker\DataMappers;

use Ant\Tracker\Entities\Action;

class ActionMapper extends DataMapper
{
    /**
     * @param int $id
     * @return Action|null
     */
    public function getById(int $id): ?Action
    {
        $query = <<<'MySQL'
        SELECT Actions.id, 
               Actions.taskUrl, 
               Actions.date, 
               Actions.startTime, 
               Actions.endTime 
        FROM Actions 
        WHERE Actions.id = :id
        MySQL;

        $queryResult = $this->select($query, ['id' => $id])[0];
        return $queryResult ? $this->registry->getActionFactory()->createObject($queryResult) : null;
    }

    /**
     * @param int $year
     * @param int $month
     * @return array<Action>
     */
    public function getByMonth(int $year, int $month): array
    {
        $query = <<<'MySQL'
        SELECT Actions.id, 
               Actions.taskUrl, 
               Actions.date, 
               Actions.startTime, 
               Actions.endTime 
        FROM Actions 
        WHERE YEAR(Actions.date) = :year 
          AND MONTH(Actions.date) = :month
        MySQL;

        $queryResult = $this->select($query, ['year' => $year, 'month' => $month]);
        $actions = [];
        foreach ($queryResult as $row)
        {
            $actions[] = $this->registry->getActionFactory()->createObject($row);
        }
        return $actions;
    }

    /**
     * @param string $date
     * @return array<Action>
     */
    public function getByDate(string $date): array
    {
        $query = <<<'MySQL'
        SELECT Actions.id, 
               Actions.taskUrl, 
               Actions.date, 
               Actions.startTime, 
               Actions.endTime 
        FROM Actions 
        WHERE Actions.date = :date
        MySQL;

        $queryResult = $this->select($query, ['date' => $date]);
        $actions = [];
        foreach ($queryResult as $row)
        {
            $actions[] = $this->registry->getActionFactory()->createObject($row);
        }
        return $actions;
    }

    /**
     * @return array<Action>
     */
    public function getAll(): array
    {
        $query = <<<'MySQL'
        SELECT Actions.id, 
               Actions.taskUrl, 
               Actions.date, 
               Actions.startTime, 
               Actions.endTime 
        FROM Actions
        MySQL;

        $queryResult = $this->select($query);
        $actions = [];
        foreach ($queryResult as $row)
        {
            $actions[] = $this->registry->getActionFactory()->createObject($row);
        }
        return $actions;
    }

    /**
     * @param Action $action
     * @return void
     */
    public function add(Action $action): void
    {
        $query = <<<'MySQL'
        INSERT INTO Actions (taskUrl, date, startTime, endTime) 
        VALUE (:taskUrl, :date, :startTime, :endTime)
        MySQL;

        $this->edit($query, [
            'taskUrl' => $action->getTaskUrl(),
            'date' => $action->getDate(),
            'startTime' => $action->getStartTime(),
            'endTime' => $action->getEndTime()
        ]);
    }

    /**
     * @param Action $action
     * @return void
     */
    public function update(Action $action): void
    {
        $query = <<<'MySQL'
        UPDATE Actions 
        SET Actions.taskUrl = :taskUrl, 
            Actions.date = :date, 
            Actions.startTime = :startTime, 
            Actions.endTime = :endTime 
        WHERE Actions.id = :id
        MySQL;

        $this->edit($query, [
            'id' => $action->getId(),
            'taskUrl' => $action->getTaskUrl(),
            'date' => $action->getDate(),
            'startTime' => $action->getStartTime(),
            'endTime' => $action->getEndTime()
        ]);
    }

    /**
     * @param $id
     * @return void
     */
    public function delete($id): void
    {
        $query = <<<'MySQL'
        DELETE FROM Actions 
        WHERE Actions.id = :id
        MySQL;

        $this->edit($query, [
            'id' => $id
        ]);
    }
}
