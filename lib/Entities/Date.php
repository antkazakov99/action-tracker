<?php

namespace Ant\Tracker\Entities;

use Ant\Tracker\DateType;

include_once '../autoload.php';

class Date
{
    /**
     * @var int|null
     */
    private ?int $id;
    /**
     * @var string
     */
    private string $date;
    /**
     * @var DateType
     */
    private DateType $dateType;
    /**
     * @var array<Action>
     */
    private array $actions;

    /**
     * @param int|null $id
     * @param string $date
     * @param DateType $dateType
     * @param array<Action> $actions
     */
    public function __construct(?int $id, string $date, DateType $dateType, array $actions)
    {
        $this->id = $id;
        $this->date = $date;
        $this->dateType = $dateType;
        $this->actions = $actions;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return void
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     * @return void
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * @return DateType
     */
    public function getDateType(): DateType
    {
        return $this->dateType;
    }

    /**
     * @param DateType $dateType
     * @return void
     */
    public function setDateType(DateType $dateType): void
    {
        $this->dateType = $dateType;
    }

    /**
     * @return array<Action>
     */
    public function getActions(): array
    {
        return $this->actions;
    }
}