<?php

namespace Ant\Tracker;

use Ant\Tracker\Entities\Action;
use Ant\Tracker\Entities\Date;
use Ant\Tracker\Entities\Month;

class ApplicationHelper
{
    /**
     * @param $year
     * @param $month
     * @return array<Date>
     */
    public static function getDatesByMonth($year, $month): array
    {
        $daysCount = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $datesInDb = Registry::instance()->getDateMapper()->getByMonth($year, $month);

        $dates = [];
        $findDate = function (Date $var) use(&$dates)
        {
            return $dates[$var->getDate()] = $var;
        };
        array_map($findDate, $datesInDb);

        for ($day = 1; $day <= $daysCount; $day++) {
            $dateString = self::formatDate($year, $month, $day);

            if (!$dates[$dateString]) {
                $dayOfTheWeek = self::getDayOfTheWeek($year, $month, $day) < 6 ? DateType::Workday : DateType::Weekend;
                $dates[$dateString] = Registry::instance()->getDateFactory()->createObject(['id' => null, 'date' => $dateString, 'dateType' => $dayOfTheWeek->value]);
            }

            $actions = Registry::instance()->getActionMapper()->getByDate($dateString);
            $dates[$dateString]->setActions($actions);
        }

        ksort($dates);

        return $dates;
    }

    /**
     * @param int $year
     * @param int $month
     * @param int $day
     * @return string
     */
    public static function getDayOfTheWeek(int $year, int $month, int $day): string
    {
        return date('N', strtotime("$year-$month-$day"));
    }

    /**
     * @param string $startTime
     * @param string $endTime
     * @return int
     */
    public static function getSummaryTime(string $startTime, string $endTime): int
    {
        return strtotime($endTime) - strtotime($startTime);
    }

    /**
     * @param int $seconds
     * @return string
     */
    public static function formatTime(int $seconds): string
    {
        return str_pad(intdiv($seconds, 3600), 2, '0', STR_PAD_LEFT) . ' ч. ' . str_pad(intdiv($seconds % 3600, 60), 2, '0', STR_PAD_LEFT) . ' м.';
    }

    /**
     * @param int $year
     * @param int $month
     * @param int $day
     * @return string
     */
    public static function formatDate(int $year, int $month, int $day): string
    {
        return str_pad($year, 4, '0', STR_PAD_LEFT) . '-' . str_pad($month, 2, '0', STR_PAD_LEFT) . '-' . str_pad($day, 2, '0', STR_PAD_LEFT);
    }

    /**
     * @param Date $date
     * @return int
     */
    public static function getDateSummaryTime(Date $date): int
    {
        $sumTime = function ($carry, Action $item) {
            return $carry + ApplicationHelper::getSummaryTime($item->getStartTime(), $item->getEndTime());
        };

        return array_reduce($date->getActions(), $sumTime, 0);
    }

    /**
     * @param Month $month
     * @return int
     */
    public static function getMonthSummaryTime(Month $month): int
    {
        $sumTime = function ($carry, Date $item) {
            return $carry + ApplicationHelper::getDateSummaryTime($item);
        };

        return array_reduce($month->getDates(), $sumTime, 0);
    }

    /**
     * @param Month $month
     * @return int
     */
    public static function getWorkdaysCount(Month $month): int
    {
        $count = 0;
        foreach ($month->getDates() as $date) {
            if ($date->getDateType() === DateType::Workday) {
                $count++;
            }
        }
        return $count;
    }

    /**
     * @param Month $month
     * @return int
     */
    public static function getEndedWorkdaysCount(Month $month): int
    {
        $count = 0;
        foreach ($month->getDates() as $date) {
            if ($date->getDateType() === DateType::Workday && !empty($date->getActions())) {
                $count++;
            }
        }
        return $count;
    }

    /**
     * @param int $salary
     * @param int $targetHours
     * @param int $workdaysCount
     * @return float
     */
    public static function calculateSalaryPerHour(int $salary, int $targetHours, int $workdaysCount): float
    {
        return round($salary / $workdaysCount / $targetHours, 2);
    }

    /**
     * @param int $salary
     * @param int $targetHours
     * @param int $workdaysCount
     * @param int $summaryTime
     * @return float
     */
    public static function calculateSalary(int $salary, int $targetHours, int $workdaysCount, int $summaryTime): float
    {
        return round($salary / $workdaysCount / ($targetHours * 3600) * $summaryTime, 2) ;
    }
}