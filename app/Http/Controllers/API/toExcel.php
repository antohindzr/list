<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

        $spreadsheet = new Spreadsheet();
        $toExcel = new Xlsx($spreadsheet);
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'FIO');
        $sheet->setCellValue('C1', 'E-mail');
        $sheet->setCellValue('D1', 'Ph.number');

        $row = 2;
        foreach($entries as $content){
        $sheet->setCellValue('A' . $row, $content['id']);
        $sheet->setCellValue('B' . $row, $content['fio']);
        $sheet->setCellValue('C' . $row, $content['email']);
        $sheet->setCellValue('D' . $row, $content['number']);
        $row++;}
        $toExcel->save('listuserto.xlsx');