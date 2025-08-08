<?php
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


/**
 * Mengekspor data ke file Excel.
 *
 * @param array $data Data yang akan diekspor.
 * @param array $col Header kolom untuk file Excel.
 * @param string $file_name Nama file output Excel.
 * @return int Mengembalikan 1 jika sukses, atau 0 jika gagal.
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


/**
 * Mengimpor data dari file XLSX.
 *
 * @param string $file_name Nama file XLSX yang akan diimpor.
 * @param string|null $sheet_name Nama sheet yang akan diimpor (opsional). Jika null, sheet pertama akan digunakan.
 * @return array Data yang diimpor dari file XLSX dalam bentuk array.
 */
function import_xlsx($file_name, $sheet_name = null)
{
    if (file_exists($file_name)) {
        $spreadsheet = IOFactory::load($file_name);
    } else {
        throw new Exception("File not found: " . $file_name);
    }
    if ($sheet_name === null) {
        $sheet_name = $spreadsheet->getSheetNames()[0];
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
    $col = 'A';
    for ($i = 0; $i <= $highestColumnIndex - 1; $i++) {
        $columnNames[$i] = $activeSheet->getCell($col . '1')->getValue();
        if ($columnNames[$i] === null) {
            $columnNames[$i] = '';
        }
        $col++;
    }
    log_message('debug', implode(', ', $columnNames) . '');
    for ($i = 2; $i <= $highestRow; $i++) {
        $row = [];
        for ($j = 1; $j <= $highestColumnIndex; $j++) {
            $cellValue = $activeSheet->getCell([$j, $i])->getValue();
            if ($cellValue === null) {
                $cellValue = '';
            }

            $row[$columnNames[$j - 1]] = $cellValue;
        }
        $data[] = $row;
    }
    foreach ($data as $row) {
        log_message('debug', implode(', ', $row));
    }
    return $data;
}