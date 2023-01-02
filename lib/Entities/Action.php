<?php

namespace Ant\Tracker\Entities;

class Action
{
    /**
     * @var int|null
     */
    private ?int $id;
    /**
     * @var string
     */
    private string $taskUrl;
    /**
     * @var string
     */
    private string $date;
    /**
     * @var string
     */
    private string $startTime;
    /**
     * @var string
     */
    private string $endTime;

    /**
     * @param int|null $id
     * @param string $taskUrl
     * @param string $date
     * @param string $startTime
     * @param string $endTime
     */
    public function __construct(?int $id, string $taskUrl, string $date, string $startTime, string $endTime)
    {
        $this->id = $id;
        $this->taskUrl = $taskUrl;
        $this->date = $date;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
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
    public function getTaskUrl(): string
    {
        return $this->taskUrl;
    }

    /**
     * @param string $url
     * @return void
     */
    public function setTaskUrl(string $url): void
    {
        $this->taskUrl = $url;
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
     * @return string
     */
    public function getStartTime(): string
    {
        return $this->startTime;
    }

    /**
     * @param string $time
     * @return void
     */
    public function setStartTime(string $time): void
    {
        $this->startTime = $time;
    }

    /**
     * @return string
     */
    public function getEndTime(): string
    {
        return $this->endTime;
    }

    /**
     * @param string $time
     * @return void
     */
    public function setEndTime(string $time): void
    {
        $this->endTime = $time;
    }
}