<?php
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


/**
 * Summary of export
 * @param mixed[] $data
 * @param string[] $col
 * @param mixed $file_name
 * @return int
 */
function export_excel($data, $col, $file_name): int
{
    $spreadsheet = new Spreadsheet();

    $sheet = $spreadsheet->getActiveSheet();
    $alphabet = 'A';
    foreach ($col as $value) {
        $sheet->setCellValue($alphabet . '1', $value);
        $alphabet++;
    }
    $count = 2;
    $alphabet = 'A';

    foreach ($data as $row) {
        foreach ($col as $key) {
            $sheet->setCellValue($alphabet . $count, $row[$key]);
            $alphabet++;
        }
        $count++;
        $alphabet = 'A';
    }

    $writer = new Xlsx($spreadsheet);
    $writer->save($file_name);
    return 0;
}

function import_xlsx($file_name, $sheet_name)
{
    if (file_exists($file_name)) {
        $spreadsheet = IOFactory::load($file_name);
    } else {
        throw new Exception("File not found: " . $file_name);
    }

    $spreadsheet->setActiveSheetIndexByName($sheet_name);
    $activeSheet = $spreadsheet->getActiveSheet();

    if (!$activeSheet) {
        throw new Exception("Sheet not found: " . $sheet_name);
    }
    $highestRow = $activeSheet->getHighestRow();
    $highestColumn = $activeSheet->getHighestColumn();
    $data = [];
    $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);
    $columnNames = [];
    log_message('debug', "Highest Row: $highestRow");
    log_message('debug', "Highest Column: $highestColumn");
    log_message('debug', "Highest Column Index: $highestColumnIndex");
    $col = 'A';
    for ($i = 0; $i <= $highestColumnIndex - 1; $i++) {
        $columnNames[$i] = $activeSheet->getCell($col . '1')->getValue();
        if ($columnNames[$i] === null) {
            $columnNames[$i] = '';
        }
        $col++;
        log_message('debug', "Column $col: " . $columnNames[$i]);
        log_message('debug', "Column letter: " . $col);
    }
    foreach ($columnNames as $key => $value) {
        log_message('debug', "Column $key: $value");
    }

    for ($i = 2; $i <= $highestRow; $i++) {
        $row = [];
        for ($j = 2; $j <= $highestColumnIndex - 1; $j++) {
            $cellValue = $activeSheet->getCell([$j, $i])->getValue();
            if ($cellValue === null) {
                $cellValue = '';
            }

            $row[$columnNames[$j - 1]] = $cellValue;
        }
        $data[] = $row;
    }
    return $data;
}