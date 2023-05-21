<?php

namespace AppTest\Acme;

use App\Acme\Services\HolidayHelper;
use PHPUnit\Framework\TestCase;

class HolidayHelperTest extends TestCase
{
    private HolidayHelper $holidayHelper;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->holidayHelper = new HolidayHelper();
    }

    /**
     * @dataProvider isPolishHolidayDataProvider
     */
    public function testIsPolishHoliday(string $date, bool $expected): void
    {
        $date = new \DateTime($date);
        $this->assertSame($expected, $this->holidayHelper->isPolishHoliday($date));
    }

    public function isPolishHolidayDataProvider(): array
    {
        return [
            '2021-01-01' => [
                '2021-01-01',
                true,
            ],
            '2021-01-02' => [
                '2021-01-02',
                false,
            ],
            '2021-01-06' => [
                '2021-01-06',
                true,
            ],
            '2021-05-01' => [
                '2021-05-01',
                true,
            ],
            '2021-05-02' => [
                '2021-05-02',
                false,
            ],
            '2021-05-03' => [
                '2021-05-03',
                true,
            ],
            '2021-08-15' => [
                '2021-08-15',
                true,
            ],
            '2021-11-01' => [
                '2021-11-01',
                true,
            ],
            '2021-11-11' => [
                '2021-11-11',
                true,
            ],
            '2021-12-25' => [
                '2021-12-25',
                true,
            ],
            '2021-12-26' => [
                '2021-12-26',
                true,
            ],
        ];
    }

    /**
     * @dataProvider isWorkingDayDataProvider
     */
    public function testIsWorkingDay(string $date, bool $expected): void
    {
        $date = new \DateTime($date);
        $this->assertSame($expected, $this->holidayHelper->isWorkingDay($date));
    }

    public function isWorkingDayDataProvider()
    {
        return [
            '2021-01-01' => [
                '2021-01-01',
                false,
            ],
            '2021-01-02' => [
                '2021-01-02',
                false,
            ],
            '2021-01-03' => [
                '2021-01-03',
                false,
            ],
            '2021-01-04' => [
                '2021-01-04',
                true,
            ],
            '2021-01-05' => [
                '2021-01-05',
                true,
            ],
            '2021-01-06' => [
                '2021-01-06',
                false,
            ],
            '2021-01-07' => [
                '2021-01-07',
                true,
            ],
            '2021-01-08' => [
                '2021-01-08',
                true,
            ],
            '2021-01-09' => [
                '2021-01-09',
                false,
            ],
            '2021-01-10' => [
                '2021-01-10',
                false,
            ],
            '2021-05-01' => [
                '2021-05-01',
                false,
            ],
            '2021-05-02' => [
                '2021-05-02',
                false,
            ],
            '2021-05-03' => [
                '2021-05-03',
                false,
            ],
            '2021-05-04' => [
                '2021-05-04',
                true,
            ],
        ];
    }
}
