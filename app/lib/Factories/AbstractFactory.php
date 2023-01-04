<?php

namespace Ant\Tracker\Factories;

use Ant\Tracker\Registry;

include_once '../autoload.php';

class AbstractFactory
{
    /**
     * @var Registry
     */
    protected Registry $registry;

    /**
     *
     */
    public function __construct()
    {
        $this->registry = Registry::instance();
    }
}