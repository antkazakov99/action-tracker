<?php

namespace Ant\Tracker;

include_once 'autoload.php';

use Ant\Tracker\DataMappers\ActionMapper;
use Ant\Tracker\DataMappers\MonthMapper;
use Ant\Tracker\DataMappers\DateMapper;

class Registry
{
    private const CONFIG_PATH = __DIR__ . '/config.ini';
    private static ? self $instance = null;
    private array $config = [];
    private ? ActionMapper $actionMapper = null;
    private ? MonthMapper $monthMapper = null;
    private ? DateMapper $dateMapper = null;
    private function __construct()
    {
        if (file_exists(self::CONFIG_PATH)) {
            if ($config = parse_ini_file(self::CONFIG_PATH, true)) {
                $this->config = $config;
            }
        }
    }
    public static function instance(): self
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function getConfig(): array
    {
        return $this->config;
    }
    public function getActionMapper(): ActionMapper
    {
        if (!$this->actionMapper) {
            $this->actionMapper = new ActionMapper();
        }
        return $this->actionMapper;
    }
    public function getMonthMapper(): MonthMapper
    {
        if (!$this->monthMapper) {
            $this->monthMapper = new MonthMapper();
        }
        return $this->monthMapper;
    }
    public function getDateMapper(): DateMapper
    {
        if (!$this->dateMapper) {
            $this->dateMapper = new DateMapper();
        }
        return $this->dateMapper;
    }
}