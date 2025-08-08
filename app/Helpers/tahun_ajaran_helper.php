<?php


function getPeriodeSemester(DateTime $date)
{
    $month = $date->format("m");
    if ($month >= 8 && $month <= 12) {
        return 'Ganjil';
    } elseif ($month >= 1 && $month <= 7) {
        return 'Genap';
    }

    return null;

}
function getTahunAjaran(DateTime $date)
{
    $year = $date->format('Y');
    switch (getPeriodeSemester($date)) {
        case 'Ganjil':
            return $year . '/' . ($year + 1);

        case 'Genap':
            # code...
            return ($year - 1) . '/' . $year;

        default:
            return null;
    }
}
