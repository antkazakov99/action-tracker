<?php

namespace Ant\Tracker\Factories;

use Ant\Tracker\Entities\Action;

class ActionFactory
{
    /**
     * @param array{id: int, taskUrl: string, date: string, startTime: string, endTime: string} $row
     * @return Action
     */
    public function createObject(array $row): Action
    {
        return new Action($row['id'], $row['taskUrl'], $row['date'], $row['startTime'], $row['endTime']);
    }
}