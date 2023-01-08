<?php

namespace Ant\Tracker\Entities;

class Month extends DomainObject
{
    /**
     * @var int|null
     */
    private ?int $id;
    /**
     * @var int
     */
    private int $year;
    /**
     * @var int
     */
    private int $month;
    /**
     * @var int
     */
    private int $salary;
    /**
     * @var int
     */
    private int $targetHours;
    /**
     * @var int|null
     */
    private ?int $avgSalary;
    /**
     * @var array<Date>
     */
    private array $dates = [];
    /**
     * @var array<Action>
     */
    private array $actions = [];

    /**
     * @param int|null $id
     * @param int $year
     * @param int $month
     * @param int $salary
     * @param int $targetHours
     * @param int $avgSalary
     */
    public function __construct(?int $id, int $year, int $month, int $salary, int $targetHours, int $avgSalary)
    {
        $this->id = $id;
        $this->year = $year;
        $this->month = $month;
        $this->salary = $salary;
        $this->targetHours = $targetHours;
        $this->avgSalary = $avgSalary;
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
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @param int $year
     * @return void
     */
    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    /**
     * @return int
     */
    public function getMonth(): int
    {
        return $this->month;
    }

    /**
     * @param int $month
     * @return void
     */
    public function setMonth(int $month): void
    {
        $this->month = $month;
    }

    /**
     * @return int
     */
    public function getSalary(): int
    {
        return $this->salary;
    }

    /**
     * @param int $salary
     * @return void
     */
    public function setSalary(int $salary): void
    {
        $this->salary = $salary;
    }

    /**
     * @return int
     */
    public function getTargetHours(): int
    {
        return $this->targetHours;
    }

    /**
     * @param int $targetHours
     * @return void
     */
    public function setTargetHours(int $targetHours): void
    {
        $this->targetHours = $targetHours;
    }

    /**
     * @return int|null
     */
    public function getAvgSalary(): ?int
    {
        return $this->avgSalary;
    }

    /**
     * @param int|null $avgSalary
     * @return void
     */
    public function setAvgSalary(?int $avgSalary): void
    {
        $this->avgSalary = $avgSalary;
    }

    /**
     * @return array<Date>
     */
    public function getDates(): array
    {
        return $this->dates;
    }

    /**
     * @param array<Date> $dates
     */
    public function setDates(array $dates): void
    {
        $this->dates = $dates;
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
     * @return array{id: int, year: int, month: int, salary: int, targetHours: int, avgSalary: int}
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'year' => $this->year,
            'month' => $this->month,
            'salary' => $this->salary,
            'targetHours' => $this->targetHours,
            'avgSalary' => $this->avgSalary
        ];
    }

    /**
     * @return array{id: int, year: int, month: int, salary: int, targetHours: int, avgSalary: int}
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}