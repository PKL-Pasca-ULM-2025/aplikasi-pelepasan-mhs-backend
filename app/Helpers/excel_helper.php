<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as Writer;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as Reader;


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

		$writer = new Writer($spreadsheet);
		$writer->save($file_name);
    return 0;
}

/**
 * Summary of import_excel
 * @param mixed $file_path
 * @return array
 */
function import_excel($file_path) {
    $reader = new Reader();
    $spreadsheet = $reader->load($file_path);
    $worksheet = $spreadsheet->getActiveSheet()->toArray();
    $data = [];
    $col = $worksheet[0];
    for ($i=1; $i < count($worksheet); $i++) { 
        $count = 0;
        $temp = [];
        foreach ($col as $key) {
            $temp[$key] = $worksheet[$i][$count];
            $count++;
        }
        array_push($data,$temp);
    }
    return $data;
}