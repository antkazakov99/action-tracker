<?php

namespace Ant\Tracker\Entities;

class Month
{
    private ?int $id;
    private int $year;
    private int $month;
    private int $salary;
    private int $targetHours;
    private ?int $avgSalary;
    public function __construct(?int $id, int $year, int $month, $salary, $targetHours, $avgSalary)
    {
        $this->id = $id;
        $this->year = $year;
        $this->month = $month;
        $this->salary = $salary;
        $this->targetHours = $targetHours;
        $this->avgSalary = $avgSalary;
    }
    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(?int $id): void
    {
        $this->id = $id;
    }
    public function getYear(): string
    {
        return $this->year;
    }
    public function setYear(int $year): void
    {
        $this->year = $year;
    }
    public function getMonth(): string
    {
        return $this->month;
    }
    public function setMonth(int $month): void
    {
        $this->month = $month;
    }
    public function getSalary(): int
    {
        return $this->salary;
    }
    public function setSalary(int $salary): void
    {
        $this->salary = $salary;
    }
    public function getTargetHours(): int
    {
        return $this->targetHours;
    }
    public function setTargetHours(int $targetHours): void
    {
        $this->targetHours = $targetHours;
    }
    public function getAvgSalary(): ?int
    {
        return $this->avgSalary;
    }
    public function setAvgSalary(?int $avgSalary): void
    {
        $this->avgSalary = $avgSalary;
    }
}