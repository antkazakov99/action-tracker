<?php

namespace Ant\Tracker\Entities;

enum DateType: int
{
    case Holiday = 1;
    case Workday = 2;
    case SickDay = 3;
}

class Date
{
    public ?int $id;
    public string $date;
    public DateType $dateType;
    public function __construct(?int $id, string $date, DateType $dateType)
    {
        $this->id = $id;
        $this->date = $date;
        $this->dateType = $dateType;
    }
    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(?int $id): void
    {
        $this->id = $id;
    }
    public function getDate(): string
    {
        return $this->date;
    }
    public function setDate(string $date): void
    {
        $this->date = $date;
    }
    public function getDateType(): DateType
    {
        return $this->dateType;
    }
    public function setDateType(DateType $dateType): void
    {
        $this->dateType = $dateType;
    }
}