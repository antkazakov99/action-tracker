<?php

namespace Ant\Tracker;

enum DateType: int
{
    case Weekend = 1;
    case Workday = 2;
    case Holiday = 3;
    case SickDay = 4;
    case Vacation = 5;
}
