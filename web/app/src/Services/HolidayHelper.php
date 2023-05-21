<?php

namespace App\Acme\Services;

use App\Acme\Foo;
use PHPUnit\Framework\TestCase;

class HolidayHelper
{
    public const POLISH_HOLIDAYS =
        [
            [
                'name'   => 'New Year',
                'namePL' => 'Nowy Rok',
                'date'   => '01-01',
                'type'   => 'fixed',
            ],
            [
                'name'   => "Three Kings' Day",
                'namePL' => 'Święto Trzech Króli',
                'date'   => '01-06',
                'type'   => 'fixed',
            ],
            [
                'name'   => 'Labour Day',
                'namePL' => 'Święto Pracy',
                'date'   => '05-01',
                'type'   => 'fixed',
            ],
            [
                'name'   => '3 May Constitution Day',
                'namePL' => 'Narodowe Święto Konstytucji Trzeciego Maja',
                'date'   => '05-03',
                'type'   => 'fixed',
            ],
            [
                'name'   => 'Assumption of Mary',
                'namePL' => 'Wniebowzięcie Najświętszej Maryi Panny',
                'date'   => '08-15',
                'type'   => 'fixed',
            ],
            [
                'name'   => "All Saints' Day",
                'namePL' => 'Wszystkich Świętych',
                'date'   => '11-01',
                'type'   => 'fixed',
            ],
            [
                'name'   => 'National Independence Day',
                'namePL' => 'Narodowe Święto Niepodległości',
                'date'   => '11-11',
                'type'   => 'fixed',
            ],
            [
                'name'   => 'Christmas',
                'namePL' => 'Boże Narodzenie',
                'date'   => '12-25',
                'type'   => 'fixed',
            ],
            [
                'name'   => 'Second Day of Christmas',
                'namePL' => 'Boże Narodzenie - drugi dzień',
                'date'   => '12-26',
                'type'   => 'fixed',
            ],
        ];

    public function isPolishHoliday(\DateTime $date): bool
    {
        $date = $date->format('m-d');
        foreach (self::POLISH_HOLIDAYS as $holiday) {
            if ($holiday['date'] === $date) {
                return true;
            }
        }

        return false;
    }

    public function isWorkingDay(\DateTime $date): bool
    {
        $dayOfWeek = $date->format('N');
        if ($dayOfWeek > 5 || $this->isPolishHoliday($date)) {
            return false;
        }

        return true;
    }
}