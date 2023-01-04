<?php

namespace Ant\Tracker\Factories;

use Ant\Tracker\Entities\Action;

include_once '../autoload.php';

class ActionFactory extends AbstractFactory
{
    /**
     * @param array $row
     * @return Action
     */
    public function createObject(array $row): Action
    {
        return new Action($row['id'], $row['taskUrl'], $row['date'], $row['startTime'], $row['endTime']);
    }
}