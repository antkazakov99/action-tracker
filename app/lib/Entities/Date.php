<?php

namespace Ant\Tracker\Entities;

use Ant\Tracker\DateType;

class Date extends DomainObject
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
    private array $actions = [];

    /**
     * @param int|null $id
     * @param string $date
     * @param DateType $dateType
     */
    public function __construct(?int $id, string $date, DateType $dateType)
    {
        $this->id = $id;
        $this->date = $date;
        $this->dateType = $dateType;
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

    /**
     * @param array<Action> $actions
     */
    public function setActions(array $actions): void
    {
        $this->actions = $actions;
    }

    /**
     * @return array{id: int, date: string, dateType: int}
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'date' => $this->date,
            'dateType' => $this->dateType->value
        ];
    }

    /**
     * @return array{id: int, date: string, dateType: int}
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}