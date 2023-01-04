<?php

namespace Ant\Tracker;

include_once '../autoload.php';

use Ant\Tracker\DataMappers\ActionMapper;
use Ant\Tracker\DataMappers\MonthMapper;
use Ant\Tracker\DataMappers\DateMapper;
use Ant\Tracker\Factories\ActionFactory;
use Ant\Tracker\Factories\DateFactory;
use Ant\Tracker\Factories\MonthFactory;

class Registry
{
    private const CONFIG_PATH = __DIR__ . '/../config.ini';
    /**
     * @var Registry|null
     */
    private static ? self $instance = null;
    /**
     * @var array
     */
    private array $config = [];
    /**
     * @var ActionMapper|null
     */
    private ? ActionMapper $actionMapper = null;
    /**
     * @var MonthMapper|null
     */
    private ? MonthMapper $monthMapper = null;
    /**
     * @var DateMapper|null
     */
    private ? DateMapper $dateMapper = null;
    /**
     * @var MonthFactory|null
     */
    private ? MonthFactory $monthFactory = null;
    /**
     * @var DateFactory|null
     */
    private ? DateFactory $dateFactory = null;
    /**
     * @var ActionFactory|null
     */
    private ? ActionFactory $actionFactory = null;

    /**
     *
     */
    private function __construct()
    {
        if (file_exists(self::CONFIG_PATH)) {
            if ($config = parse_ini_file(self::CONFIG_PATH, true)) {
                $this->config = $config;
            }
        }
    }

    /**
     * @return static
     */
    public static function instance(): self
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * @return ActionMapper
     */
    public function getActionMapper(): ActionMapper
    {
        if (!$this->actionMapper) {
            $this->actionMapper = new ActionMapper();
        }
        return $this->actionMapper;
    }

    /**
     * @return MonthMapper
     */
    public function getMonthMapper(): MonthMapper
    {
        if (!$this->monthMapper) {
            $this->monthMapper = new MonthMapper();
        }
        return $this->monthMapper;
    }

    /**
     * @return DateMapper
     */
    public function getDateMapper(): DateMapper
    {
        if (!$this->dateMapper) {
            $this->dateMapper = new DateMapper();
        }
        return $this->dateMapper;
    }

    /**
     * @return MonthFactory
     */
    public function getMonthFactory(): MonthFactory
    {
        if (!$this->monthFactory) {
            $this->monthFactory = new MonthFactory();
        }
        return $this->monthFactory;
    }

    /**
     * @return DateFactory
     */
    public function getDateFactory(): DateFactory
    {
        if (!$this->dateFactory) {
            $this->dateFactory = new DateFactory();
        }
        return $this->dateFactory;
    }

    /**
     * @return ActionFactory
     */
    public function getActionFactory(): ActionFactory
    {
        if (!$this->actionFactory) {
            $this->actionFactory = new ActionFactory();
        }
        return $this->actionFactory;
    }
}