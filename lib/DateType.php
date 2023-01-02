<?php

namespace Ant\Tracker;

enum DateType: int
{
    case DayOff = 1;
    case Workday = 2;
    case SickDay = 3;
}
