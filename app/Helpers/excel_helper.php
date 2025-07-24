<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


/**
 * Summary of export
 * @param mixed[] $data
 * @param string[] $col
 * @param mixed $file_name
 * @return int
 */
function export_excel($data, $col, $file_name) : int {
		$spreadsheet = new Spreadsheet();

		$sheet = $spreadsheet->getActiveSheet();
        $alphabet = 'A';
        foreach ($col as $value) {
            $sheet->setCellValue($alphabet.'1',$value);
            $alphabet++;
        }
		$count = 2;
        $alphabet = 'A';

		foreach($data as $row)
		{
            foreach ($col as $key) {
                $sheet->setCellValue($alphabet.$count,$row[$key]);
                $alphabet++;
            }
			$count++;
            $alphabet = 'A';
		}

		$writer = new Xlsx($spreadsheet);
		$writer->save($file_name);
    return 0;
}