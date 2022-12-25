<?php

namespace Ant\Tracker\Entities;

class Action
{
    private ?int $id;
    private string $taskUrl;
    private string $date;
    private string $startTime;
    private string $endTime;
    public function __construct(?int $id, string $taskUrl, string $date, string $startTime, string $endTime)
    {
        $this->id = $id;
        $this->taskUrl = $taskUrl;
        $this->date = $date;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
    }
    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(?int $id): void
    {
        $this->id = $id;
    }
    public function getTaskUrl(): string
    {
        return $this->taskUrl;
    }
    public function setTaskUrl(string $url): void
    {
        $this->taskUrl = $url;
    }
    public function getDate(): string
    {
        return $this->date;
    }
    public function setDate(string $date): void
    {
        $this->date = $date;
    }
    public function getStartTime(): string
    {
        return $this->startTime;
    }
    public function setStartTime(string $time): void
    {
        $this->startTime = $time;
    }
    public function getEndTime(): string
    {
        return $this->endTime;
    }
    public function setEndTime(string $time): void
    {
        $this->endTime = $time;
    }
}