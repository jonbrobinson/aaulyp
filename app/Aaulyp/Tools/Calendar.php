<?php

namespace App\Aaulyp\Tools;

/**
 * Calender variables
 */
class Calendar {

    /**
     * @return array
     */
    public function getMonths()
    {
        $months = [
            "Jan" => "January",
            "Feb" => "February",
            "Mar" => "March",
            "Apr" => "Apil",
            "May" => "May",
            "Jun" => "June",
            "Jul" => "July",
            "Aug" => "August",
            "Sep" => "September",
            "Oct" => "October",
            "Nov" => "November",
            "Dec" => "December"
        ];

        return $months;
    }

    /**
     * @return array
     */
    public function getDaysNumbers()
    {
        $numDays = [
            "1" => "1",
            "2" => "2",
            "3" => "3",
            "4" => "4",
            "5" => "5",
            "6" => "6",
            "7" => "7",
            "8" => "8",
            "9" => "9",
            "10" => "10",
            "11" => "11",
            "12" => "12",
            "13" => "13",
            "14" => "14",
            "15" => "15",
            "16" => "16",
            "17" => "17",
            "18" => "18",
            "19" => "19",
            "20" => "20",
            "21" => "21",
            "22" => "22",
            "23" => "23",
            "24" => "24",
            "25" => "25",
            "26" => "26",
            "27" => "27",
            "28" => "28",
            "29" => "29",
            "30" => "30",
            "31" => "31"
        ];

        return $numDays;
    }

    /**
     * @return array
     */
    public function getDaysOfTheWeek()
    {
        $daysOfWeek = [
            "Mon" => "Monday",
            "Tue" => "Tuesday",
            "Wed" => "Wednesday",
            "Thu" => "Thursday",
            "Fri" => "Friday",
            "Sat" => "Saturday",
            "Sun" => "Sunday"
        ];

        return $daysOfWeek;
    }

    /**
     * @return array
     */
    public function getCalendarArrays()
    {
        $data = array();

        $data['months'] = $this->getMonths();
        $data['numberDays'] = $this->getDaysNumbers();
        $data['daysOfTheWeek'] = $this->getDaysOfTheWeek();
        $data['hours'] = $this->getTime12Hour();

        return $data;
    }

    public function getTime12Hour()
    {
        $time = [
            "12:00",
            "12:15",
            "12:30",
            "12:45",
            "1:00",
            "1:15",
            "1:30",
            "1:45",
            "2:00",
            "2:15",
            "2:30",
            "2:45",
            "3:00",
            "3:15",
            "3:30",
            "3:45",
            "4:00",
            "4:15",
            "4:30",
            "4:45",
            "5:00",
            "5:15",
            "5:30",
            "5:45",
            "6:00",
            "6:15",
            "6:30",
            "6:45",
            "7:00",
            "7:15",
            "7:30",
            "7:45",
            "8:00",
            "8:15",
            "8:30",
            "8:45",
            "9:00",
            "9:15",
            "9:30",
            "9:45",
            "10:00",
            "10:15",
            "10:30",
            "10:45",
            "11:00",
            "11:15",
            "11:30",
            "11:45",
        ];
        return $time;
    }
}