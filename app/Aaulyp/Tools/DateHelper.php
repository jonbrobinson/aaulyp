<?php

namespace App\Aaulyp\Tools;

/**
 * Calender variables
 */
class DateHelper extends Calendar
{
    /**
     * Get an Epoch Timestamp from a daterange passed in
     *
     * @param string $dateRange epoch time stamp
     *
     * @return int
     */
    public function getStartTimeFromRange($dateRange)
    {
        $dates = $this->splitDateRange($dateRange, "-");


        $startTime = trim(strtotime($dates[0]));

        return $startTime;
    }

    /**
     * Get an Epoch Timestamp from a daterange passed in
     *
     * @param string $dateRange epoch time stamp
     *
     * @return int
     */
    public function getEndTimeFromRange($dateRange)
    {
        $dates = $this->splitDateRange($dateRange, "-");

        $endTime = trim(strtotime($dates[1]));

        return $endTime;
    }

    /**
     * @param string $dateRange human readable timestamp
     *
     * @return array|bool
     */
    protected function splitDateRange($dateRange, $delimeter = "-")
    {
        $dateArray = explode($delimeter, $dateRange);

        return $dateArray;
    }
}